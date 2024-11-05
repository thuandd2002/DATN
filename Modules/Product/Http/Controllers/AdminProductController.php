<?php

namespace Modules\Product\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Modules\Admin\Models\Image\Image;
use Modules\Admin\Models\Image\ImageProduct;
use Modules\Admin\Models\Menu\Menu;
use Modules\Product\Http\Requests\RequestProduct;
use Modules\Product\Models\Attribute\Attribute;
use Modules\Product\Models\Product;
use Modules\Product\Models\ProductValue;

class AdminProductController extends Controller
{
    public function __construct()
    {
        \File::deleteDirectory(storage_path('framework/cache'));
    }

    public function getListProduct(Request $request)
    {
        $products = Product::with([
            'menu' => function ($menu) {
                $menu->select('m_title', 'id');
            },
            'value' => function ($value) {
                $value->select('av_name', 'av_attribute_id');
            }
        ]);

        $attributes = Attribute::with(
            [
                'value' => function ($value) {
                    $value->select('id', 'av_name', 'av_attribute_id');
                }
            ]
        )->get()->toArray();

        if ($request->id) $products->where('id', $request->id);
        if ($request->n) $products->where('pro_name', 'like', '%' . $request->n . '%');
        if ($request->m) $products->where('pro_menu_id', $request->m);
        if ($request->alpha) $products->where('pro_name', 'like', mb_strtolower($request->alpha) . '%');
        if ($request->po) $products->where('pro_position', $request->po);

        $products = $products->where('pro_import', 1)
            ->orderBy('id', 'DESC')->paginate(10);

        $viewData = [
            'products' => $products,
            'query' => $request->query(),
            'menus' => $this->getListMenuSort(),
            'alphabet' => config('bang_chu_cai'),
            'attributes' => $attributes
        ];

        return view('product::product.index', $viewData);
    }

    public function getListProductImport(Request $request)
    {
        $products = Product::with([
            'menu' => function ($menu) {
                $menu->select('m_title', 'id');
            },
            'value' => function ($value) {
                $value->select('av_name', 'av_attribute_id');
            }
        ]);

        $attributes = Attribute::with(
            [
                'value' => function ($value) {
                    $value->select('id', 'av_name', 'av_attribute_id');
                }
            ]
        )->get()->toArray();

        if ($request->id) $products->where('id', $request->id);
        if ($request->n) $products->where('pro_name', 'like', '%' . $request->n . '%');
        if ($request->m) $products->where('pro_menu_id', $request->m);
        if ($request->alpha) $products->where('pro_name', 'like', mb_strtolower($request->alpha) . '%');
        if ($request->po) $products->where('pro_position', $request->po);

        $products = $products->where('pro_import', 0)
            ->orderBy('id', 'DESC')->paginate(10);

        $viewData = [
            'products' => $products,
            'query' => $request->query(),
            'menus' => $this->getListMenuSort(),
            'alphabet' => config('bang_chu_cai'),
            'attributes' => $attributes
        ];

        return view('product::productImport.index', $viewData);
    }

    public function getListMenuSort()
    {
        $menu = Menu::where('m_active', Menu::M_ACTIVE)
            ->where('m_type', Menu::TYPE_PRODUCT)
            ->select('id', 'm_parent_id', 'm_title')->get();

        Menu::recursive($menu, $parent = 0, $level = 1, $menuSort);
        return $menuSort;
    }


    public function create()
    {
        $viewData = [
            'menus' => $this->getListMenuSort(),
            'fuel' => $this->getFuel(),
            'company' => $this->getCompany()
        ];

        return view('product::productImport.create', $viewData);
    }

    public function store(RequestProduct $requestProduct)
    {
        $product = $requestProduct->only(['pro_title_seo',
            'pro_keyword_seo',
            'pro_description_seo',
            'pro_menu_id',
            'pro_position',
            'pro_name',
            'pro_slug',
            'pro_price_import',
            'pro_price_repair',
            'pro_description',
            'pro_specifications',
            'pro_content',
            'rose',
            'maximum_deposit','numbers_of_cars_left']);
        $productValue = $requestProduct->only(['designs',
            'interior_color',
            'engine_capacity',
            'origin',
            'fuel',
            'year_of_manufacturing',
            'gear',
            'number_of_seats',
            'went',
            'drive',
            'car_color',
            'door_number']);
        $product['created_at'] = $product['updated_at'] = Carbon::now();
        $product['pro_admin_id'] = get_id_by_user('admins');
        $check_avatar = $this->uploadImage('pro_avatar');
        if ($check_avatar) $product['pro_avatar'] = $check_avatar;

        try {
            $id_product = Product::insertGetId($product);
            $productValue['product_id'] = $id_product;
            ProductValue::insert($productValue);
        } catch (\Exception $e) {
            \Log::info("[Errors Create Product ]" . $e->getMessage());
            dd($e);
            $errors = 'errors';
        }

        if (isset($errors)) {
            $this->getMessagesSuccess('Có lỗi xẩy ra');
            return redirect()->back();
        }
        if ($requestProduct->list_image) {
            $listImage = trim($requestProduct->list_image, ',');
            $this->insertProductImage($listImage, $id_product);
        }
        if ($id_product && $requestProduct->hasFile('files')) {
            $this->saveImage($requestProduct->file('files'), $id_product);
        }


        $this->getMessagesSuccess();
        $route = 'get.list.productImport';
        if ($requestProduct->save == 'add') $route = 'get.create.product';

        return redirect()->route($route);
    }

    public function edit($id)
    {
        $product = Product::with(['images', 'productVal'])->find($id);

        $productValue = $product->productVal;
        $viewData = [
            'productValue' => $productValue,
            'menus' => $this->getListMenuSort(),
            'product' => $product,
            'list_id' => json_encode($product->images->pluck('id')->toArray()),
            'company' => $this->getCompany(),
            'fuel' => $this->getFuel()
        ];
        return view('product::productImport.update', $viewData);
    }

    public function update(RequestProduct $requestProduct, $id)
    {

        $productData = $requestProduct->only(
            ['pro_title_seo',
                'pro_keyword_seo',
                'pro_description_seo',
                'pro_menu_id', 'pro_position',
                'pro_name', 'pro_slug',
                'pro_price_import',
                'pro_price',
                'pro_price_repair',
                'pro_description',
                'pro_specifications',
                'pro_content',
                'rose',
                'maximum_deposit','numbers_of_cars_left']);
        $productValue = $requestProduct->only(
            ['designs',
                'interior_color',
                'engine_capacity',
                'origin', 'fuel',
                'year_of_manufacturing',
                'gear', 'number_of_seats',
                'went', 'drive', 'car_color',
                'door_number']);       
        $check_avatar = $this->uploadImage('pro_avatar');
        try {
            $product = Product::findOrFail($id);
            if ($check_avatar) $product['pro_avatar'] = $check_avatar;
            $product->update($productData);
            $proVal = ProductValue::where('product_id', $id)->first();

            $proVal->update($productValue);

        } catch (\Exception $e) {
            \Log::info("[Errors Create Product ]" . $e->getMessage());
            return redirect()->back();
        }

        if ($requestProduct->list_image) {
            $listImage = json_decode($requestProduct->list_image);
            if ($listImage) {
                $product->images()->whereNotIn('id', $listImage)->delete();
            }
        } else {
            $check = Product\ProductImage::where('pi_product_id', $id)->first();
            if ($check) $check->delete();
        }

        if ($requestProduct->hasFile('files')) {
            $this->saveImage($requestProduct->file('files'), $id);
        }

        $this->getMessagesSuccess('Cập nhật ');
        if ($product['pro_import'] == 1) {
            $route = 'get.list.product';
        } else {
            $route = 'get.list.productImport';
        }


        return redirect()->route($route);
    }


    public function active(Request $request, $id)
    {
        if ($request->ajax()) {
            $product = Product::findOrFail($id);
            $product->pro_active = !$product->pro_active;
            $product->save();
            $code = 1;

            return \response([
                'code' => $code,
                'active' => $product->pro_active
            ]);
        }
    }

    public function import(Request $request, $id)
    {
        if ($request->ajax()) {
            $product = Product::findOrFail($id);
            $product->pro_import = !$product->pro_import;
            $product->save();
            $code = 1;

            return \response([
                'code' => $code,
                'import ' => $product->pro_import
            ]);
        }
    }


    public function saveImage($images, $id)
    {
        foreach ($images as $fileKey => $fileImage) {
            // make sure each file is valid
            if ($fileImage->isValid()) {

                $ext = $fileImage->getClientOriginalExtension();

                $extend = ['png', 'jpg', 'jpeg', 'avg'];

                if (!in_array($ext, $extend)) {
                    return false;
                }

                $filename = date('Y-m-d__') . str_slug_fix(str_replace($ext, '', $fileImage->getClientOriginalName())) . '.' . $ext;
                $path = public_path() . '/uploads/' . date('Y/m/d/');
                if (!\File::exists($path)) {
                    mkdir($path, 0777, true);
                }

                // di chuyen file vao thu muc uploads
                $fileImage->move($path, $filename);
                $image = new Product\ProductImage();
                $image->pi_name = $filename;
                $image->pi_slug = str_slug_fix($filename);
                $image->pi_product_id = $id;
                $image->save();
            }
        }
    }

    public function hot(Request $request, $id)
    {
        if ($request->ajax()) {
            $product = Product::findOrFail($id);
            $product->pro_type = !$product->pro_type;
            $product->save();
            $code = 1;

            return \response([
                'code' => $code,
                'hot' => $product->pro_type
            ]);
        }
    }

    public function previewProduct(Request $request, $id)
    {
        if ($request->ajax()) {
            $product = Product::with('images')->find($id);

            $productHtml = view('admin::common.modal.preview_product', compact('product'))->render();

            return \response([
                'data' => $productHtml,
            ]);
        }
    }

    public function uploadImage($name)
    {
        if (Input::hasFile($name)) {
            $image = upload_image($name);
            if ($image['code'] != 1) return false;

            return $image['name'];
        }
    }

    public function insertProductImage($listImage, $id)
    {
        $listImage = explode(',', $listImage);
        $data_image = [];
        ImageProduct::where('ip_product_id', $id)->delete();
        foreach ($listImage as $item) {
            $data_image[] = [
                'ip_product_id' => $id,
                'ip_image_id' => $item
            ];
        }

        ImageProduct::insert($data_image);
    }

    public function delete(Request $request, $id)
    {
        $code = 0;
        if ($request->ajax()) {
            $product = Product::findOrFail($id);
            $product->delete();

            $code = 1;
        }

        \File::deleteDirectory(storage_path('framework/cache'));

        return \response([
            'code' => $code,
        ]);
    }

    public function getMessagesSuccess($messages = 'Thêm mới')
    {
        \Session::flash('toastr', [
            'type' => 'success',
            'message' => $messages . ' thành công'
        ]);
    }

    public function getCompany()
    {
        return config('setting.company');
    }

    public function getFuel()
    {
        return config('setting.fuel');
    }
}
