<?php

namespace App\Http\Controllers\AuthAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\Captcha;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class AdminLoginController extends Controller
{
	use AuthenticatesUsers;

    public function getLoginAdmin()
    {
       return view('admin::auth.login');
     
    }

    public function postLoginAdmin(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => new Captcha()
        ]);

        $credentials = $request->except('g-recaptcha-response');
    	$this->validate($request, $this->getAdminLoginRequestRules(),
            $this->getAdminLoginRequestMessages());

        $credentials = [
            'email'         =>  $request->email,
            'password'      =>  $request->password
        ];

        if (Auth::guard('admins')->attempt($credentials, $request->has('remember')))
        {
            if(\Auth::guard('admins')->user()->id != 1){

                return redirect('/admin/my-chart');
            }
            return redirect('/admin');

        }

        return $this->sendFailedLoginResponse($request);
    }

    public function getAdminLoginRequestRules()
    {
        return [
            'email'     =>  'required|email|max:255',
            'password'  =>  'required|regex:/^[a-z0-9A-Z_-]{6,100}$/'
        ];
    }

    public function getAdminLoginRequestMessages(){
        return [
            'email.required'        =>  'Vui lòng nhập email',
            'email.email'           =>  'Email chưa xác nhận',
            'email.max'             =>  'Địa chỉ email quá dài',
            'password.required'     =>  'Vui lòng nhập mật khẩu',
            'password.regex'        =>  'Mật khẩu chứa ký tự đặc biệt'
        ];
    }

    // dang xuat
    public function getLogoutAdmin(Request $request)
    {
        \Auth::guard('admins')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route( 'AdminLogin');
    }
}
