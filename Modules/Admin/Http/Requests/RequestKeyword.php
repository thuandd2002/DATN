<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestKeyword extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'k_name'           => 'required|max:70|unique:keywords,id'.$this->get('id'),
        ];
    }

    public function messages()
    {
        return [
            'k_name.required'             => 'Mời bạn điền từ khoá',
            'k_name.unique'               => 'Từ khoá đã tồn tại',
            'k_name.max'                  => 'Từ khoá quá dài',
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
