<?php

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    public function index()
    {
//        var_dump($_SESSION);
        $this->view("master", [
            "page" => "login"
        ]);
    }

    public function action()
    {
        $email = _POST('email');
        $password = _POST('password');

        $validation = validation(_POST()+_FILES(), 'LoginRequest');
        if ($validation) {
            foreach ($validation as $key => $value) {
                $_SESSION["notification"]["login"] = [
                    "status" => "error",
                    "message" => $value
                ];
                return new RedirectResponse('/auth/login');
            }
        }

        $user = $this->model('User');
        if (!$user->login($email, $password)) {
            $_SESSION["notification"]["login"] = [
                "status" => "error",
                "message" => "Sai tài khoản hoặc mật khẩu"
            ];
            return new RedirectResponse('/auth/login');
        }

        $_SESSION["user"] = $email;
        $_SESSION["notification"]["login"] = [
            "status" => "success",
            "message" => "Đăng nhập tài khoản thành công"
        ];
        return new RedirectResponse('/');
    }
}