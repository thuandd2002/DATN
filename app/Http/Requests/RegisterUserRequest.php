<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required|max:191',
            'email' => 'required|email|max:191|unique:users,email,'.$this->id,
            'phone' => 'required|regex:/^0[0-9]{9}$/|unique:users,phone,'.$this->id,           
            'password'  => ['required', 'min:6'],
            'r_password' => ['required', 'same:password']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập vào họ và tên.',
            'name.max' => 'Họ và tên vượt quá số ký tự cho phép.',
            'email.required' => 'Vui lòng nhập vào email.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email tài khoản không thể trùng lặp.',
            'email.max' => 'Email tài khoản vượt quá số ký tự cho phép.',
            'password.required' => 'Vui lòng nhập mật khẩu đăng nhập.',
            'password.min' => 'Vui lòng nhập mật khẩu trên 6 kí tự.',
            'r_password.required' => 'Vui lòng nhập lại mật khẩu đăng nhập.',
            'r_password.same' => 'Mật khẩu không trùng khớp.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.regex' => 'Không đúng định dạng số điện thoại.',
            'phone.unique' => 'Số điện thoại đã được sử dụng.',
            
        ];
    }
}
