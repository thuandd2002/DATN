<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\User;
use Modules\Admin\Models\Order\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoMail;
use App\Mail\SendEmailChangePassword;
class AccountController extends FrontendController
{
    public function index(Request $request)
    {
        if (!Auth::guard('web')->check()) {
            return redirect()->to('/');
        }
        $user = Auth::guard('web')->user();

        return view('oto.account.index', compact('user'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $data = $request->except('_token');
        try {
            $id = Auth::guard('web')->user()->id;
            $user = User::find($id);
            if ($user) {
                $user->update($data);
                return redirect()->back();
            }
        } catch (\Exception $exception) {
            return redirect()->to('/');
        }
    }

    public function calendar(Request $request)
    {
        if (!Auth::guard('web')->check()) {
            return redirect()->to('/');
        }
        $id = Auth::guard('web')->user()->id;
        $orders = Order::with(['product'])->where('o_guest_id', $id);
        $orders = $orders->paginate(10);

        $status= $this->getTextIndexAttribute();

        $viewData = [
            'orders' => $orders,
            'status' => $status
        ];
        return view('oto.account.calendar', $viewData);
    }

    public function getTextIndexAttribute()
    {
        return config('setting.status');
    }

    public function changePassword()
    {
        return view('oto.account.change_password');
    }

    public function postChangePassword(ChangePasswordRequest $request)
    {
        $data['password'] = bcrypt($request->password);

        try {
            
            if (!Auth::guard('web')->check()) {
                return redirect()->to('/');
            }
            $id = Auth::guard('web')->user()->id;
            $user = User::find($id);
           
            if ($user) {
                $user->update($data);
            }
           
            return redirect()->back()->with('success', 'Cập nhật mật khẩu thành công');
        } catch (\Exception $exception) {
            return redirect()->back()->with('danger', '[Error ]'.$exception->getMessage());
        }
    }

    public function forgotPassword()
    {
        return view('auth.passwords.reset');
    }

    public function postForgotPassword(Request $request)
    {
        try {
            $user = User::where('email' , $request->email)->first();

            if (!$user) {
                return redirect()->back()->with('error', 'Thông tin email không chính xác');

            }
            $password = randString(8);

            $user->password = Hash::make($password);
            $user->save();
            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'address' => $user->address,
                'password' => $password
            ];
          
            try{
                
                Mail::to($request->email)
                ->send(new SendEmailChangePassword($data));          
                return redirect()->back()->with('success', 'Một mật khẩu mới đã được gửi tới mail của bạn');
            }catch (\Exception $e)
            {
                \Log::error("[Send Email Errors Guest] ".$e->getMessage());
            }

        } catch (\Exception $exception) {
            return redirect()->back()->with('danger', '[Error ]'.$exception->getMessage());
        }
    }
}