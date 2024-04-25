<?php
use JiJiHoHoCoCo\IchiValidation\Validator;

function request($file)
{
    return require __DIR__ . "/../requests/$file.php";
}

function validation($params, $request, $lang = VALIDATOR_LANG_DEFAULT)
{
    $validator = new Validator();
    $validation = request($request);
//    var_dump($validation);
    $boolResult = $validator->validate($params, $validation[0], $validation[1]);
    $errorMessages=$boolResult==FALSE ? $validator->getErrors() : [];
    if( count($errorMessages) == 0 || !$errorMessages ){
        return false;
    }
    return $errorMessages;
}

function validation_lang($lang)
{
    return require __DIR__ . "/../config/validation-langs/$lang.php";
}

function XSS($string): string|int
{
    if(is_numeric($string)){
        if(is_int($string)){
            return (int)$string;
        }

        if(strpos($string, '.')){
            return $string;
        }

        return (int)$string;
    }
    return trim(htmlspecialchars(addslashes($string)));
    //return str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($data))));
}

function _FORMAT($arr = [], $key = false): array|string
{
    if (!$key) {
        $newArr = [];
        foreach ($arr as $key => $value) {
            $newArr[$key] = XSS($value);
        }
        return $newArr;
    }

    return XSS($arr[$key]);
}

function _POST($key = false): array|string
{
    return _FORMAT($_POST, $key);
}

function _GET($key = false): array|string
{
    return _FORMAT($_GET, $key);
}

function _FILES($key = false)
{
    if (!$key) {
        $newArr = [];
        foreach ($_FILES as $key => $value) {
            $newArr[$key] = ($value);
        }
        return $newArr;
    }

    return $_FILES[$key] ?? false;
}

function model($model){
    require_once __DIR__."/../models/$model.php";
    return new $model;
}

function auth($key = false, $user=false): bool|array|string
{
    if (empty($_SESSION['user'])) {
        return false;
    }

    $user = (!$user ? $_SESSION["user"] : $user);

    $auth = model('User')->auth($user);
    if($key){
        return $auth[$key];
    }

    return $auth;
}

function guest(): bool
{
    if (!empty($_SESSION['user'])) {
        return false;
    }

    return true;
}

function asset($uri): string
{
    return BASE_URL."/public/$uri";
}

function base($uri): string
{
    return BASE_URL.$uri;
}