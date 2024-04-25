<?php
require_once __DIR__.'/core/autoload.php';

//debug
if(DEBUG){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

use Buki\Router\Router;
use \Symfony\Component\HttpFoundation\RedirectResponse;

$router = new Router;

//home
$router->get('/', 'HomeController@index');

//register
$router->get('/auth/register', 'registerController@index', ['before' => 'GuestMiddleware']);
$router->post('/auth/register-action', 'registerController@action', ['before' => 'GuestMiddleware']);

//login
$router->get('/auth/login', 'loginController@index', ['before' => 'GuestMiddleware']);
$router->post('/auth/login-action', 'loginController@action', ['before' => 'GuestMiddleware']);

//logout
$router->get('/user/logout', function() {
    unset($_SESSION['user']);
    $_SESSION["notification"]["logout"] = [
        "status" => "success",
        "message" => "Đăng xuất tài khoản thành công"
    ];
    return new RedirectResponse("/");
});

//create product
$router->get('/product/create', 'productController@create', ['before' => 'AuthMiddleware']);
$router->post('/product/create-action', 'productController@createAction', ['before' => 'AuthMiddleware']);

$router->run();