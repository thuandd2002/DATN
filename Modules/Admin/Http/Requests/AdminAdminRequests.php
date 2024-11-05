<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminAdminRequests extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'           => 'unique:admins,email',
            'name'           => 'required',
            'address'           => 'required',
            'phone'           => 'required',
            'age'           => 'required',
            'role'          =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'email.unique'=>  'Đã có dữ liệu, mời bạn nhập email khác',
            'name.required'=>  'Mời bạn nhập tên',
            'address.required'=>  'Mời bạn nhập address',
            'phone.required'=>  'Mời bạn nhập phone',
            'age.required'=>  'Mời bạn nhập age',
            'role.required'=>  'Mời bạn chọn quyền'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}