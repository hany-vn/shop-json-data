<?php

class Product extends Model
{
    protected string $table = 'products';

    public function getProducts($limit=[
        "start" => 0,
        "end" => 12
    ], $orderBy="desc"){
        return $this->select()->orderBy($orderBy)->limit($limit["start"], $limit["end"])->get();
    }
    public function create(
        $name,
        $price,
        $img
    ): bool
    {
        $uploadImage = $this->uploadImage($img);
        if (!$uploadImage) {
            echo "Upload ảnh thất bại";
            return false;
        };

        $insert = $this->insert([
            "name" => $name,
            "price" => $price,
            "img" => asset("uploads/$uploadImage")
        ]);
        if ($insert) {
            return true;
        }

        echo "Thêm sản phẩm thất bại";
        return false;
    }

    private function uploadImage($file): false|string
    {
        $nameFile = md5(uniqid().time());
        $extension = pathinfo($file["name"], PATHINFO_EXTENSION);
        $fullNameFile = $nameFile.'.'.$extension;

        $uploadDir = 'public/uploads/';
        $uploadFile = $uploadDir . basename($fullNameFile);

        if (move_uploaded_file($file["tmp_name"], $uploadFile)) {
            return $fullNameFile;
        }
        return false;
    }
}