<?php

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends Controller
{
    public function index()
    {
        $this->view("master", [
            "page" => "register"
        ]);
    }

    public function action()
    {
        $fullname = _POST('fullname');
        $phone = _POST('phone');
        $email = _POST('email');
        $password = _POST('password');
        $password = _POST('password');
        $confirm_password = _POST('confirm_password');
        $img = _FILES('img');

        $validation = validation(_POST()+_FILES(), 'RegisterRequest');
        if ($validation) {
            foreach ($validation as $key => $value) {
                $_SESSION["notification"]["create_product"] = [
                    "status" => "error",
                    "message" => $value
                ];
                return new RedirectResponse('/auth/register');
            }
        }

        $user = $this->model('User');

        if($user->existEmail($email)){
            $_SESSION["notification"]["register"] = [
                "status" => "error",
                "message" => "Email đã tồn tại trong hệ thống"
            ];
            return new RedirectResponse('/auth/register');
        }

        if($user->existPhone($phone)){
            $_SESSION["notification"]["register"] = [
                "status" => "error",
                "message" => "Số điện thoại đã tồn tại trong hệ thống"
            ];
            return new RedirectResponse('/auth/register');
        }

        if (!$user->create(
            $fullname,
            $phone,
            $email,
            $password,
            $img
        )) {
            $_SESSION["notification"]["register"] = [
                "status" => "error",
                "message" => "Có lỗi xãy ra vui lòng thử lại"
            ];
            return new RedirectResponse('/auth/register');
        }

        $_SESSION["user"] = $email;
        $_SESSION["notification"]["register"] = [
            "status" => "success",
            "message" => "Đăng ký tài khoản thành công"
        ];
        return new RedirectResponse('/');
    }
}