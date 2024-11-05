<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Models\Image\Image;
use Modules\Admin\Models\Image\ImageProduct;


class AdminImageController extends AdminBaseController
{
    public function getListImage()
    {
        $images = Image::paginate(20);

        $viewData = [
            'images' => $images
        ];

        return view('admin::image.index',$viewData);
    }

    public function create()
    {
        return view('admin::image.create');
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            if ($request->hasFile('file')) {

                foreach ($request->file('file') as $fileKey => $fileImage ) {
                    // make sure each file is valid
                    if ($fileImage->isValid()) {

                        $ext = $fileImage->getClientOriginalExtension();

                        $extend = ['png','jpg','jpeg'];

                        if( !in_array($ext,$extend))
                        {
                            return false;
                        }

                        $name_image = trim(str_replace('.'.$ext,'',strtolower($fileImage->getFilename())));

                        $filename = date('Y-m-d__').str_slug($name_image) . '.' . $ext;
                        $path = public_path().'/uploads/'.date('Y/m/d/');
                        if ( !\File::exists($path))
                        {
                            mkdir($path,0777,true);
                        }

                        // di chuyen file vao thu muc uploads
                        $fileImage->move($path,$filename);
                        $image = new Image();
                        $image->im_name = $filename;
                        $image->im_slug = str_slug_fix($filename);
                        $image->save();
                    }
                }
            }
        }
    }

    public function deleteImageAjax(Request $request,$id)
    {
        if($request->ajax())
        {
            Image::findOrFail($id)->delete();
            return response(['code' => 1]);
        }
    }

    public function deleteAll()
    {
        Image::truncate();
        ImageProduct::truncate();

        $this->getMessagesSuccess(' Đã xoá toàn bộ dữ liệu ảnh');
        return redirect()->back();
    }

    public function getListImageAjax(Request $request)
    {
        if ($request->ajax()) {
            $images = Image::paginate(18);
            return view('admin::blocks.inc_list_image', ['images' => $images])->render();
        }
    }
}
