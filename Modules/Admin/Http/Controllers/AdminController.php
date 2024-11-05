<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Comment;
use App\User;
use Fico7489\Laravel\Pivot\Tests\Models\Post;
use Illuminate\Http\Response;
use Modules\Admin\Models\Article\Article;
use Modules\Admin\Models\Order\Order;
use Modules\Product\Models\Product;
use Carbon\Carbon;

class AdminController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $current = Carbon::now()->format('Y-m-d');
        $orders = Order::where('car_viewing_day','=',$current)->get();
        $guests = User::orderBy('id','DESC')->get();
        $users = User::all();
        $comments = Comment::with('user:id,name,avatar,email')
            ->orderBy('id','DESC')
            ->get();

        $posts   = Article::count('id');
        $product = Product::count('id');



        $viewData = [
            'guests'   => $guests,
            'comments' => $comments,
            'product'  => $product,
            'posts'    => $posts,
            'order'    => $orders,
            'current'   => $current,
            'user'      =>   $users
        ];

        return view('admin::dashboard.index',$viewData);
    }

}
