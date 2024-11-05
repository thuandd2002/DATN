<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Modules\Product\Models\Product;

class SearchController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function search(Request $request)
    {
        $products = Product::select('*');
        if (isset($request->k)) {
            $products->where('pro_name', 'like', '%'. $request->k . '%')->where('pro_active','=',1);
        }
        $products = $products->paginate(9);
        return view('oto.search',compact('products'));
    }
}
