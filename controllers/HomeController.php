<?php
class HomeController extends Controller
{
    public function index()
    {
        $product = $this->model('Product');
        $getProducts = $product->getProducts();

        $this->view("master", [
            "page" => "home",
            "products" => $getProducts
        ]);
    }
}