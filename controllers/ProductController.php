<?php

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{
    public function create()
    {
        $this->view("master", [
            "page" => "create_product"
        ]);
    }

    public function createAction()
    {
        $name = _POST('name');
        $price = _POST('price');
        $img = _FILES('img');

        $validation = validation(_POST()+_FILES(), 'CreateProductRequest');
        if ($validation) {
            foreach ($validation as $key => $value) {
                $_SESSION["notification"]["register"] = [
                    "status" => "error",
                    "message" => $value
                ];
                return new RedirectResponse('/product/create');
            }
        }

        $product = $this->model('Product');

        if (!$product->create(
            $name,
            $price,
            $img
        )) {
            $_SESSION["notification"]["create_product"] = [
                "status" => "error",
                "message" => "Có lỗi xãy ra vui lòng thử lại"
            ];
            return new RedirectResponse('/auth/register');
        }

        $_SESSION["notification"]["create_product"] = [
            "status" => "success",
            "message" => "Thêm sản phẩm thành công"
        ];
        return new RedirectResponse('/product/create');
    }
}