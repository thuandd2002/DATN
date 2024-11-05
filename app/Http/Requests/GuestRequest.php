<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestRequest extends FormRequest
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
            'email'=>'email',
            'number'=>'integer|max:10|regex:/^0[0-9]{9}$/',
        ];
    }
    public function messages()
    {
        return[
            'email.email'=>'Không đúng định dạng mail',
            'number.regex'=>'Không đúng định dạng mail',
            'number.max'=>'Nhập tối đa 10 số',
        ];
    }
}
