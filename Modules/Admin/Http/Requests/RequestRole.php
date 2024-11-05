<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRole extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'display_name'                => 'required|unique:roles,display_name,id'.$this->get('id'),
            'description'         => 'required|max:160',
        ];
    }

    public function messages()
    {
        return [
            'display_name.required'             => 'Mời bạn nhập tên vai trò ',
//            'name.regex'                => 'Nhóm quyền ko chưa ký tự đặc biệt khoảng khoảng trắng',
            'display_name.unique'               => 'Tên vai trò đã tồn tại',
            'description.required'      => 'Mời bạn điền mô tả về vai trò',
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