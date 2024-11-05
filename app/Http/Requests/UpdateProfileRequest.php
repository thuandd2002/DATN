<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            //
            'name' => 'required | max:191',
            'email' => 'required | email | max:191',
            'phone' => 'required | max:191',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Dữ liệu không thể để trống.',
            'name.max' => 'Vượt quá số ký tự cho phép.',
            'email.required' => 'Dữ liệu không thể để trống.',
            'email.email' => 'Định dạng email không chuẩn xác.',
            'email.max' => 'Vượt quá số ký tự cho phép.',
            'phone.required' => 'Dữ liệu không thể để trống.',
            'phone.max' => 'Vượt quá số ký tự cho phép.',
        ];
    }
}
