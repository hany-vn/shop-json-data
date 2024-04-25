<?php
return [
    [
        'fullname' => 'required|string',
        'phone' => 'required',
        'email' => 'required|email',
        'password' => 'required|string|min:6|max:50|confirmed',
        'confirm_password' => 'required|string|min:6|max:50',
        'img' => "required|file|mime:png,jpg,jpeg,gif"
    ],

    [
        'fullname.required' => 'Vui lòng nhập họ và tên.',
        'fullname.string' => 'Họ và tên phải là chuỗi ký tự.',
        'phone.required' => 'Vui lòng nhập số điện thoại.',
        'phone.string' => 'Số điện thoại phải là chuỗi ký tự.',
        'phone.min' => 'Số điện thoại phải có ít nhất 5 ký tự.',
        'phone.max' => 'Số điện thoại không được vượt quá 15 ký tự.',
        'email.required' => 'Vui lòng nhập địa chỉ email.',
        'email.email' => 'Địa chỉ email không hợp lệ.',
        'password.required' => 'Vui lòng nhập mật khẩu.',
        'password.string' => 'Mật khẩu phải là chuỗi ký tự.',
        'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        'password.max' => 'Mật khẩu không được vượt quá 50 ký tự.',
        'password_confirmation.required' => 'Vui lòng nhập lại mật khẩu.',
        'password_confirmation.string' => 'Mật khẩu nhập lại phải là chuỗi ký tự.',
        'password_confirmation.min' => 'Mật khẩu nhập lại phải có ít nhất 6 ký tự.',
        'password_confirmation.max' => 'Mật khẩu nhập lại không được vượt quá 50 ký tự.',
        'password_confirmation.same' => 'Mật khẩu nhập lại không khớp với mật khẩu đã nhập.',
        'img.required' => 'Vui lòng chọn ảnh đại diện.',
        'img.file' => 'Tệp tải lên phải là một tệp.',
        'img.mime' => 'Ảnh đại diện phải có định dạng PNG, JPG, JPEG hoặc GIF.'
    ]
];