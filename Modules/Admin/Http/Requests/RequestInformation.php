<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestInformation extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'if_company'           => 'required',
            'if_address'           => "required",
            'if_email'             =>  "required",
            'if_phone'             => "required",
            'if_email_send'        => "required",
            'if_email_password'    => "required",
            'if_email_drive'    => "required",
            'if_email_host'    => "required",
            'if_email_port'    => "required",
            'if_email_encryption'    => "required",
            'if_time_job'    => "required"
        ];
    }

    public function messages()
    {
        return [
            'if_company.required'           => 'Mời bạn nhập tên',
            'if_address.required'           => "Mời bạn nhập địa chỉ",
            'if_email.required'             =>  "Mời bạn nhập email liên hệ",
            'if_phone.required'             => "Mời bạn nhập số điện thoại liên hệ",
            'if_email_send.required'        => "Trường bắt buộc không được để trống",
            'if_email_password.required'    => "Trường bắt buộc không được để trống",
            'if_email_drive.required'    => "Trường bắt buộc không được để trống",
            'if_email_host.required'    => "Trường bắt buộc không được để trống",
            'if_email_port.required'    => "Trường bắt buộc không được để trống",
            'if_email_encryption.required'    => "Trường bắt buộc không được để trống",
            'if_time_job.required'    => "Trường bắt buộc không được để trống"
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
