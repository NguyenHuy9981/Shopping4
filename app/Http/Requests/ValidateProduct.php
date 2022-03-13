<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProduct extends FormRequest
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
            'name'=> 'required',
            'price' => 'required',
            'content' => 'required',
            // 'parent_id' => 'required',
            'feature_image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute này đã tồn tại',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Sản phẩm',
            'price' => 'Giá tiền',
            'content' => 'Nội dung',
            'feature_image' => 'Ảnh phụ',
        ];
    }
}
