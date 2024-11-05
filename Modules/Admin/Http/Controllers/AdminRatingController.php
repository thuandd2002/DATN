<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Models\Rating\Rating;

use Modules\Product\Models\Product;
use Illuminate\Support\Facades\DB;
class AdminRatingController extends AdminBaseController{
    public function index()
    {
        // $rating =  Product::all(); 
        // $rating = DB::table('rating')
        // ->join('products', 'rating.products_id', '=', 'products.id')      
        // ->select('rating.*','products.pro_name',DB::raw('avg(rating)'))
        // ->get();
      
        // $viewData =[
        //     'rating' => $rating,
        // ];
        // $data = Product::with('rating')
        // ->join('rating','rating.id','=','rating.products_id')
        // ->select('rating.*',DB::raw('avg(rating)'))
        // ->get();

        $raiting = Rating::with(['product'])->select('products_id',DB::raw('avg(rating) as avg_rating'),'rating.id')
        ->groupBy('products_id')
        ->leftJoin('products', 'rating.products_id', '=', 'products.id')
        ->get()->toArray();
    
         $viewData = [
            'rating' => $raiting
        ];
       return view('admin::rating.index',$viewData);
    }
  
    public function delete(Request $request,$id)
    {
       
        if ($request->ajax())
        {
            Rating::where('products_id',$id)->delete();

            return \response([
                'code'      => 1,
            ]);

        }
    }
    
}