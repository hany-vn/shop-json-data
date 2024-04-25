<?php

use Buki\Router\Http\Middleware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class GuestMiddleware extends Middleware
{
    public function handle(Request $request)
    {
        if ( auth() ) {
            $_SESSION["notification"]["guest"] = [
                "status" => "error",
                "message" => "Bạn đã đăng nhập rồi"
            ];
            return new RedirectResponse("/");
        }

        return true;
    }
}