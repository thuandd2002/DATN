<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestSlide extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sl_type'           => 'required',
            'sl_name'           => "required",
            'sl_link'             =>  "required",
            'sl_description'             => "required"
        ];
    }

    public function messages()
    {
        return [
            'sl_type.required'           => "Trường bắt buộc không được để trống",
            'sl_name.required'               =>"Trường bắt buộc không được để trống",
            'sl_link.required'               =>  "Trường bắt buộc không được để trống",
            'sl_description.required'          => "Trường bắt buộc không được để trống"
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
