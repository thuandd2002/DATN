<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\SendEmailComment;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Models\Information\Information;
use Modules\Product\Models\Product;
use Illuminate\Support\Facades\Mail;
use Modules\Admin\Models\Rating\Rating;

class CommentController extends Controller
{

    public function addComment(Request $request)
    {
       
     
        DB::beginTransaction();
        try {
            //  $data = $request ->only('products_id','index');

            //     $rating = new Rating();
            //     $rating->products_id = $data['products_id'];
            //     $rating->rating = $data['index'];
            //     $rating->save();
            //      return response()->json([
            //         'status' => 'true',
            //         'code' => 1
            //     ]);
             
            $comment = Comment::create([
                'com_user_id'   => get_id_by_user('web'),
                'com_user_type' => 0,
                'com_source_id' => $request->product_id,
                'com_type'      => 0,
                'com_parent_id' =>0,
                'com_message'   => $request->comment
            ]);
         
            if ($comment) {
              Rating::create(
                [
                    'products_id' => $request->product_id,
                    'user_id' =>get_id_by_user('web'),
                    'rating' => $request->rating
                ]
              );
            }
            $user    = $comment->user()->where('id', $comment->com_user_id)->first();
            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e->getMessage());
        }
       
        $viewData    = [
            'comment' => $comment,
            'user'    => $user,
           
        ];
       
        $view = 'common.comment.layout_comment';
        $viewComment = view($view)->with($viewData)->render();
        $info           =  Information::first();
        $email_to_admin = $info->if_email;
        Log::info("--- email: ". json_encode($info));
        $product = Product::findOrFail($request->product_id);

        $data = [
            'url' => route('get.product.detail',[str_slug_fix($product->pro_name),$product->id]),
        ];


        // \Illuminate\Support\Facades\Mail::to($email_to_admin)
        //     ->send(new \App\Mail\SendEmailComment($data));

        // try{
        //     Mail::to($email_to_admin)->send(new SendEmailComment($data));
        // }catch (\Exception $e)
        // {
        //     \Log::error("[Send Email Errors Guest] ".$e->getMessage());
        // }

        return response(['data' => $viewComment]);
    }
}