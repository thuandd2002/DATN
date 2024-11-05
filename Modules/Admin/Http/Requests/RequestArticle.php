<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestArticle extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'a_title'           => 'required|max:70|unique:articles,id'.$this->get('id'),
            'a_description'     => 'required',
            'a_content'         => 'required',
            'a_menu_id'         => 'required',
            'a_title_seo'       => 'required',
            'a_keyword_seo'     => 'required',
            'a_description_seo' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'a_title.required'             => 'Mời bạn điền tiêu đề bài viết',
            'a_title.unique'               => 'Tiêu đề đã tồn tại',
            'a_title.max'                  => 'Tiêu đề quá dài',
            'a_description.required'       => 'Mời bạn nhập mô tả bài viết',
            'a_menu_id.required'           => 'Mời bạn chọn menu bài viết',
            'a_content.required'           => 'Mời bạn nhập nội dung bài viết',
            'a_title_seo.required'         => 'Mời bạn nhập meta seo bài viết',
            'a_keyword_seo.required'       => 'Mời bạn nhập meta keyword bài viết',
            'a_description_seo.required'   => 'Mời bạn nhập meta description bài viết',
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
