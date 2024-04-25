<?php
return [
    [
        'name' => 'required|string|min:4',
        'price' => 'integer|min:0',
        'img' => 'required|file|mime:png,jpg,jpeg,gif'
    ],
    [
        'name.required' => 'Tên không được để trống',
        'name.string' => 'Tên phải là chuỗi ký tự',
        'name.min' => 'Tên phải có ít nhất 4 ký tự',
        'price.required' => 'Giá không được để trống',
        'price.integer' => 'Giá phải là số nguyên',
        'price.min' => 'Giá phải lớn hơn hoặc bằng 0',
        'img.required' => 'Ảnh không được để trống',
        'img.file' => 'Ảnh phải là một tệp tin',
        'img.mime' => 'Ảnh phải là định dạng PNG, JPG, JPEG hoặc GIF'
    ]
];
