<?php

class User extends Model
{
    protected string $table = 'users';

    public function auth($user)
    {
        return $this->select()->where(
            [
                "email" => $user
            ]
        )->first();
    }

    public function existEmail($email): bool
    {
        return $this->exist(
            [
                "email" => $email
            ]
        );
    }

    public function existPhone($phone): bool
    {
        return $this->exist(
            [
                "email" => $phone
            ]
        );
    }

    public function create(
        $fullname,
        $phone,
        $email,
        $password,
        $img
    ): bool
    {
        $uploadImage = $this->uploadImage($img);
        if (!$uploadImage) {
            echo "Upload ảnh thất bại";
            return false;
        };

        $insert = $this->insert([
            "fullname" => $fullname,
            "phone" => $phone,
            "email" => $email,
            "password" => md5($password),
            "img" => asset("uploads/$uploadImage")
        ]);
        if ($insert) {
            return true;
        }

        echo "Thêm thành viên thất bại";
        return false;
    }

    public function login($email, $password): bool
    {
        if (
            $this->exist(
                [
                    "email" => $email,
                    "password" => md5($password)
                ]
            )
        ) {
            return true;
        }

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