<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Frontend\FrontendController;
use Modules\Admin\Models\Information\Information;
use Modules\Admin\Models\Menu\Menu;
use Modules\Product\Models\Product;
use App\Http\Requests\RegisterUserRequest;
use App\Rules\Captcha; 
class RegisterController extends FrontendController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // lấy thông tin website
        $information =  \Cache::store('file')->remember('informations', 600, function (){
            return  Information::first();
        });

        \View::share('information', $information);

        // lấy danh sách menu đã sắp xếp
        $menus =  \Cache::store('file')->remember('menu', 600, function (){
            return  (new  Menu())->getListMenuSort();
        });

        \View::share('menus', $menus);

        //menu san pham

        $menuProduct =  \Cache::store('file')->remember('menuProduct', 600, function (){
            return  (new  Menu())->menuProduct();
        });

        \View::share('menuProduct', $menuProduct);


        // lấy randome danh sách menu
        $menusRan =  \Cache::store('file')->remember('menuRan', 600, function (){
            return  (new  Menu())->getListRanMenu();
        });

        \View::share('menusRan', $menusRan);


        // lay danh sach san pham
        $productAll = \Cache::store('file')->remember('productAll',600, function (){
            return Product::where('pro_active',Product::PRO_ACTIVE)->select('id','pro_name')->get();
        });

        \View::share('productAll',$productAll);


        // lấy google analytics
        $analytics =  \Cache::store('file')->remember('stores.analytics', 6000, function (){
            return  \DB::table('stores')->where('s_type',0)->first();
        });

        \View::share('analytics',$analytics);
    }

    public function register()
    {

        return view('auth.register');
    }

    public function postRegister(RegisterUserRequest $request)
    {
        $request->validate([
            'g-recaptcha-response' => new Captcha()
        ]);

        $data = $request->except('_token','g-recaptcha-response');
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if ($user)
        {
            auth()->login($user);
        }else
        {
            return redirect()->back();
        }

        return redirect()->to('/');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
