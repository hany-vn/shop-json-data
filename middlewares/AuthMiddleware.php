<?php
use Buki\Router\Http\Middleware;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AuthMiddleware extends Middleware
{
    public function handle()
    {
        if ( guest() ) {
            $_SESSION["notification"]["guest"] = [
                "status" => "error",
                "message" => "Bạn cần phải đăng nhập"
            ];
            return new RedirectResponse("/auth/login");
        }

        return true;
    }
}