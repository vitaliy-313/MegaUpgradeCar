<?php

namespace App\models;

use App\base\Connection;

class User
{

    //в этом классесодержатся все методы необходимые для работы с пользователем в нашей базе
    public static function all()
    {
        $query = Connection::make()->query("SELECT users.login as login, users.email as email, users.phone as phone, users.id, role as role FROM users");
        return $query->fetchAll();
    }

    //вывод
    public static function store($data)
    {
        $query = Connection::make()->prepare("INSERT INTO users(login, email, password, phone, role_id) values(:login, :email, :password, :phone, 1)");
        return $query->execute([
            "login" => $data['login'],
            "phone" => $data['phone'],
            "email" => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT)

        ]);
    }
    //delete
    public static function destroy($id)
    {
        $query = Connection::make()->prepare("DELETE FROM users WHERE id = :id");
        return $query->execute([
            "id" => $id
        ]);
    }

    public static function getUser($login, $password)
    {
        $query = Connection::make()->prepare("SELECT * FROM users WHERE users.login=:login");
        $query->execute([
            ":login"=> $login
        ]);
        $user = $query->fetch();
        if (password_verify($password, $user->password)){
            return $user;
        }
        return null;
    }

    public static function find($id){
        $query = Connection::make()->prepare("SELECT users.* FROM users WHERE users.id = :userID");
        $query->execute([
            ":userID" =>$id
        ]);
        return $query->fetch();
    }

}
