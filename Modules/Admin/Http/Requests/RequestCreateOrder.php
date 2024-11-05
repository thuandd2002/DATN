<?php

namespace Modules\Admin\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class RequestCreateOrder extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'car_viewing_day' => Carbon::parse($this->car_viewing_day)->format('d-m-Y H:i')
        ]);
    }
    public function rules()
    {
  
    $now = Carbon::now()->format('d-m-Y H:i');


 
        return [
            'name'                => 'required',
            
            'email'                => 'required|email',
            'phone'                => 'required|numeric|min:10',
            'o_product_id'         => 'required',
            'o_status'             => 'required',
            'car_viewing_day'                => 'required|after_or_equal:'.$now
            // 'messages'                => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => 'Mời bạn nhập tên',
            'email.required'                => 'Mời bạn nhập email',
            'email.email'                => 'Mời bạn nhập email theo đúng định dạng' ,
            'phone.required'                => 'Mời bạn nhập số điện thoại',
            'phone.numeric'                => 'Mời bạn nhập số điện thoại',
            'phone.min'                => 'Mời bạn nhập số điện thoại',
            'o_product_id.required'                => 'Mời bạn nhập tên ô tô',
            'o_status.required'                => 'Mời bạn nhập trạng thái',
            'car_viewing_day.required'                => 'Mời bạn nhập ngày hẹn xem xe',
            'car_viewing_day.after_or_equal'  => 'Phải lớn hơn hoặc bằng thời gian hiện tại'
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
