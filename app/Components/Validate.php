<?php
namespace App\Components;

use Illuminate\Http\Request;

class Validate {

    public function Validate_Product(Request $request)
    {
        $request->validate([

            'name'=> 'required',
            'price' => 'required',
            'content' => 'required',
            // 'parent_id' => 'required',
            'feature_image' => 'required',
        ],
        [
            'required' => ':attribute không được để trống',
        ],
        [
            'name' => 'Tên sản phẩm',
            'price' => 'Giá tiền',
            'content' => 'Nội dung sản phẩm',
            'parent_id' => 'Danh mục'
        ]
    );
    }



}