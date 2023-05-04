<?php

namespace App\models;

use App\base\Connection;

class Product
{
    public static function all()
    {
        $query = Connection::make()->query("SELECT id, types_tunings.name as name, types_tunings.description as description, types_tunings.photo as photo FROM types_tunings ORDER BY types_tunings.id DESC LIMIT 5");
        return $query->fetchAll();
    }

    public static function allNoLimit()
    {
        $query = Connection::make()->query("SELECT id, types_tunings.name as name, types_tunings.description as description, types_tunings.photo as photo FROM types_tunings ORDER BY types_tunings.id ");
        return $query->fetchAll();
    }
    
    public static function order()
    {
        $query = Connection::make()->query("SELECT id, types_tunings.name as name, types_tunings.description as description, types_tunings.photo as photo FROM types_tunings ORDER BY types_tunings.id");
        return $query->fetchAll();
    }

    public static function stocks()
    {
        $query = Connection::make()->query("SELECT id, stocks.name as name, stocks.description as description, stocks.photo as photo, stocks.date_start , stocks.date_end FROM stocks WHERE (`date_start` < CURDATE() OR `date_start` = NULL) AND (`date_end` > CURDATE() OR `date_end`= NULL)");
        return $query->fetchAll();
    }
    
    public static function stocksForAdmin()
    {
        $query = Connection::make()->query("SELECT id, stocks.name as name, stocks.description as description, stocks.photo as photo, stocks.date_start , stocks.date_end FROM stocks");
        return $query->fetchAll();
    }

    public static function works()
    {
        $query = Connection::make()->query("SELECT id, works.photo_before as photo_before, works.photo_after as photo_after FROM works");
        return $query->fetchAll();
    }

    public static function moreTuning($id)
    {
        $query = Connection::make()->prepare("SELECT id, tunings.name as name, tunings.price as price, tunings.photo as photo FROM tunings WHERE type_tuning_id = :id");
        $query->execute(["id"=> $id]);
        return $query->fetchAll();
    }

    public static function sections()
    {
        $query = Connection::make()->query("SELECT id, sections.name as name, sections.description as description FROM sections");
        return $query->fetchAll();
    }

    public static function elementsSection()
    {
        $query = Connection::make()->query("SELECT id, elements_sections.description as description FROM elements_sections");
        return $query->fetchAll();
    }
    
    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT types_tunings.name as tuning,
         tunings.name as name,
         tunings.price as price
         FROM tunings
         INNER JOIN types_tunings ON tunings.types_tunings_id = types_tunings.id");
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    //получаем 5 последних товаров
    public static function fiveDESC()
    {
        $query = Connection::make()->query("SELECT * FROM products ORDER BY  created_at  DESC LIMIT 5");
        return $query->fetchAll();
    }

    public static function createRequest($user_id, $mark_id, $model, $tunings_id){
        $query = Connection::make()->prepare("INSERT INTO request (reqid, user_id, mark_id, model, tunings_id, created_at, status_id) VALUES (NULL, :user_id, :mark_id, :model, :tunings_id, :created_at, :status_id);");

        $query->execute([
            "user_id" => $user_id,
            "mark_id" => $mark_id,
            "model" => $model,
            "tunings_id" => $tunings_id,
            "created_at" => date('Y-m-d'),
            "status_id" => 1
        ]);
    }

    public static function getAllRequest(){
        $query = Connection::make()->query("SELECT *, tunings.name as tuning_name, types_tunings.name as types_tunings_name FROM request INNER JOIN marks ON request.mark_id = marks.id INNER JOIN tunings ON request.tunings_id = tunings.id INNER JOIN users ON request.user_id = users.id INNER JOIN statuses ON request.status_id = statuses.id INNER JOIN types_tunings ON tunings.type_tuning_id =types_tunings.id");


        return $query->fetchAll();
    }

    public static function getReqUser($user_id) {
        $query = Connection::make()->prepare("SELECT *, tunings.name as tuning_name, types_tunings.name as types_tunings_name FROM request INNER JOIN marks ON request.mark_id = marks.id INNER JOIN tunings ON request.tunings_id = tunings.id INNER JOIN users ON request.user_id = users.id INNER JOIN statuses ON request.status_id = statuses.id INNER JOIN types_tunings ON tunings.type_tuning_id =types_tunings.id WHERE request.user_id = ?");
        $query->execute([
            $user_id
        ]);
        return $query->fetchAll();
    }


    public static function editStatusReq($status_id, $request_id){
        $query = Connection::make()->prepare("UPDATE request SET status_id = :status_id WHERE request.reqid = :request_id;");

        $query->execute([
            "status_id" => $status_id,
            "request_id" => $request_id
        ]);
    }
    public static function getAllStatus(){
        $query = Connection::make()->query("SELECT * FROM statuses ");

        return $query->fetchAll();
    }

    public static function createUs($des, $name, $photo){

        $query = Connection::make()->prepare("INSERT INTO types_tunings (id, description, name, photo) VALUES (NULL, :des, :name, :photo);");

        $query->execute([
            "des" => $des,
            "name" => $name,
            "photo" => $photo,
        ]);
    }

    public static function akcii($des, $name, $photo, $date_start = "", $date_end="")
    {
        if($date_start == ""){
            $date_start = NULL;
        }
        if($date_end == ""){
            $date_end = NULL;
        }

        $query = Connection::make()->prepare("INSERT INTO stocks (id, name, description, photo, `date_start`, `date_end`) VALUES (NULL, :name, :des, :photo, :date_start, :date_end);");

        $query->execute([
            "des" => $des,
            "name" => $name,
            "photo" => $photo,
            "date_start"=>$date_start,
            "date_end"=>$date_end
        ]);
    }



    public static function createWork($photoBefore, $photoAfter)
    {
        $query = Connection::make()->prepare("INSERT INTO works (id,  photo_before, photo_after) VALUES (NULL, :photo_before, :photo_after);");

        $query->execute([
            "photo_before" => $photoBefore,
            "photo_after" => $photoAfter,
        ]);
    }

    public static function deleteWork($id)
    {
        $query = Connection::make()->prepare("DELETE FROM `works` WHERE works.id = :id;");

        $query->execute([
            "id" => $id
        ]);
    }

    public static function getTuningsByType($id){
        $query = Connection::make()->prepare("SELECT * FROM `tunings` WHERE type_tuning_id = :type_tuning_id");
        
        $query->execute([
            "type_tuning_id" => $id
        ]);

        return $query->fetchAll();
    }

    public static function delAkcii($id){
        $query = Connection::make()->prepare("DELETE FROM `stocks` WHERE id = :id");
        $query->execute(['id'=>$id]);

    }

    public static function more($id){
        $query = Connection::make()->prepare("SELECT * FROM `tunings` WHERE `type_tuning_id` = :id");
        $query->execute(["id"=>$id]);
        return $query->fetchAll();
    }

    public static function delUsl($id){
        $query = Connection::make()->prepare("DELETE FROM `types_tunings` WHERE id =:id");
        $query->execute(["id" =>$id]);
    }

    public static function getPrice($id){
        $query = Connection::make()->prepare("SELECT `price` FROM `tunings` WHERE id =:id");
        $query->execute(["id"=>$id]);
        return $query->fetch();
    }
}