<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Product\Rules\CheckSumImportRepair;

class RequestProduct extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'pro_name' => 'required|max:70|unique:products,id' . $this->get('id'),
            'pro_price'             => request('id') ? [new CheckSumImportRepair()]:'',
            'pro_menu_id' => 'required',
            'pro_description' => 'required',
            'pro_content' => 'required',
            'pro_specifications' => 'required',
            'pro_title_seo' => 'required',
            'pro_keyword_seo' => 'required',
            'pro_description_seo' => 'required',
            'went' => 'required',
            'designs' => 'required',
            'interior_color' => 'required|alpha_spaces',
            'engine_capacity' => 'required',
            'origin' => 'required',
            'fuel' => 'required',
            'year_of_manufacturing' => 'required',
            'gear' => 'required',
            'number_of_seats' => 'required|integer|max:47|min:0',
            'drive' => 'required',
            'car_color' => 'required|alpha_spaces',
            'door_number' => 'required|integer|max:5|min:0',
            'rose' => 'required|integer|max:100|min:0',
            'maximum_deposit'=>'required|integer|max:100|min:0',
            'numbers_of_cars_left' => 'required|min:0'
        ];
    }

    public function messages()
    {
        return [
            'pro_name.required' => 'Mời bạn điền tên sản phẩm',
            'pro_name.unique' => 'Tên sản phẩm đã tồn tại',
            'pro_name.max' => 'Tên sản phẩm quá dài',
            'pro_menu_id.required' => 'Mời bạn chọn menu sản phẩm',
            'pro_description.required' => 'Mời bạn chọn mô tả ',
            'pro_content.required' => 'Mời bạn nhập nội dung ',
            'pro_specifications.required' => 'Mời bạn nhập thông số',
            'pro_title_seo.required' => 'Mời bạn nhập meta tiêu đề seo ',
            'pro_keyword_seo.required' => 'Mời bạn nhập meta keyword ',
            'pro_description_seo.required' => 'Mời bạn nhập meta mô tả ',
            'went.required' => 'Mời bạn nhập số km đã đi',
            'designs.required' => 'Mời bạn nhập kiểu dáng',
            'interior_color.required' => 'Mời bạn nhập màu nội thất',
            'alpha_spaces' => 'Dữ liệu phải là chữ',
            'engine_capacity.required' => 'Mời bạn nhập dung tích động cơ',
            'origin.required' => 'Mời bạn nhập xuất xứ',
            'fuel.required' => 'Mời bạn nhiên liệu',
            'year_of_manufacturing.required' => 'Mời bạn nhập năm SX',
            'gear.required' => 'Mời bạn nhập hộp số ',
            'number_of_seats.required' => 'Mời bạn nhập số chỗ ngồi',
            'number_of_seats.max' => 'Max là 47',
            'number_of_seats.min' => 'Mời bạn nhập số dương',
            'drive.required' => 'Mời bạn nhập dẫn động',
            'car_color.required' => 'Mời bạn nhập màu xe',
            'door_number.required' => 'Mời bạn nhập số cửa',
            'door_number.max'=>'Max là 5 cửa',
            'rose.required'=>'Mời bạn nhập tỷ lệ hoa hồng cho xe',
            'rose.max'=>'Max là 100%',
            'rose.min'=>'Min là 0%',
            'maximum_deposit.required'=>'Mời bạn nhập tỷ lệ giảm giá',
            'maximum_deposit'=> 'Max là 100%',
            'maximum_deposit.min'=>'Min là 0%',
            'numbers_of_cars_left.min'=>'Mời bạn nhập số lượng xe còn lại trong kho',
            'numbers_of_cars_left.required'=>'Mời bạn nhập số lượng xe còn lại trong kho',
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
