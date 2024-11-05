<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getListComment()
    {
        // $comments = Comment::with('user:id,name,avatar,email')->orderBy('id','DESC')->get();

        $comments = Comment::with([
            'product' => function($product){
                $product->select('id','pro_name');
            },
            'user' => function($user){
                $user->select("id","name","avatar","email");
            }
        ])->orderBy('id','DESC')->get()->toArray();;

  

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        // $view_comment_today =  Comment::whereDate('created_at', DB::raw('CURDATE()'))->where('com_type',0)->get();

        $view_comment_today = Comment::with([
            'product' => function($product){
                $product->select('id','pro_name');
            },
            'user' => function($user){
                $user->select("id","name","avatar","email");
            }
        ])->whereDate('created_at', DB::raw('CURDATE()'))->where('com_type',0)->get()->toArray();;



        $viewData = [
            'comments' => $comments,
            'view_comment_day' => $view_comment_today
        ];
   
        return view('admin::comment.index',$viewData);
    }

    public function delete(Request $request,$id)
    {
        if ($request->ajax())
        {
            Comment::findOrFail($id)->delete();

            return \response([
                'code'      => 1,
            ]);

        }
    }

    public function active(Request $request,$id)
    {

        if ($request->ajax())
        {
            $comment = Comment::findOrFail($id);
            $comment->com_type = !$comment->com_type;
            $comment->save();
            $code = 1;

            return \response([
                'code'      => $code,
                'active'    => $comment->com_type
            ]);
        }
    }


}
