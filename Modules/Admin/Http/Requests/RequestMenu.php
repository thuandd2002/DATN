<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestMenu extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'm_title'           => 'required|max:70|unique:menus,id'.$this->get('id'),
            'm_title_seo'       => 'max:70',
            'm_type'            => 'required',
            'm_keyword_seo'     => 'max:160',
            'm_description_seo' => 'max:160',
        ];
    }

    public function messages()
    {
        return [
            'm_title.required'             => 'Mời bạn nhập tên menu',
            'm_title.unique'               => 'Tên menu đã tồn tại',
            'm_title.max'                  => 'Tên menu quá dài max 70 ký tự',
            'm_type.required'              => 'Mời bạn chọn kiểu menu',
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
