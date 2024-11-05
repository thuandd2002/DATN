<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAdmin extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'                => 'required|unique:admins',
            'name'                  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required'             => 'Mời bạn điền email',
            'email.unique' => 'Email đã tồn tại',
            'name.required'               => 'Mời bạn điền tên'
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
