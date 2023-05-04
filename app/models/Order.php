<?php

namespace App\models;

use App\base\Connection;

class Order 
{
    public static function all()
    {
        $query = Connection::make()->query("SELECT id, marks.name_mark as name FROM marks");
        return $query->fetchAll();
    }
    
    public static function create($user_id)
    {
        //получаем корзину пользователя
        $basket = Basket::get_basket($user_id);
        //установим подключение для работы с транзиакцией
        $conn = Connection::make();

        //транзакция
        try {
            //начинаем(запускаем) транзакцию
            $conn->beginTransaction();

            //1.создаем новый заказ(ловим его айдишник)
            $order_id = self::addOrder($user_id, $conn);
            //2.добавляем продукты в заказ
            self::addProductsInOrder($basket, $order_id, $conn);
            //3.корректируем кол-во продуктов на складе
            Product::updateCount($basket, $conn);
            //4.очистка корзины пользователя
            Basket::clear($user_id, $conn);

            //принимаем транзакцию
            $conn->commit();
        } catch (\PDOException $error) {
            //откатываем(отклоняем) транзакцию в случае ошибки
            $conn->rollBack();
            echo ("Ошибка!" . $error->getMessage());
        }
    }
    
    public static function addOrder($user_id, $conn)
    {
        $query =  $conn->prepare('INSERT INTO orders (user_id) VALUES (:user_id)');
        $query->execute(['user_id' => $user_id]);
        return $conn->lastInsertId();
    }
    
    private static function getParam($array, $value)
    {
        return implode(',', array_fill(0, count($array), $value));
    }

    public static function addProductsInOrder($basket, $order_id, $conn)
    {
        $base = 'INSERT INTO order_products (order_id, product_id, count) VALUES';
        $params = self::getParam($basket, '(?,?,?)');
        $queryText =  $base . $params;
        $values = []; //массив со значениями
        foreach ($basket as $item) {
            $values[] = $order_id;
            $values[] = $item->baskets_product_id;
            $values[] = $item->basket_count;
        }
        $query = $conn->prepare($queryText);
        $query->execute($values);
    }

    public static function delete($id)
    {
        $query =  Connection::make()->prepare('DELETE FROM orders WHERE id=:id');
        $query->execute(['id' => $id]);
        return 'delete';
    }

    public static function allStatuses()
    {
        $query = Connection::make()->query('SELECT * FROM statuses');
        return $query->fetchAll();
    }

    public static function count($id)
    {
        $query = Connection::make()->prepare("SELECT SUM(order_products.count) as count FROM order_products WHERE order_id = :id");
        $query->execute(['id' => $id]);
        return $query->fetchAll();
    }

    public static function sum($id)
    {
        $query = Connection::make()->prepare("SELECT SUM(order_products.count * tunings.price) as price FROM order_products INNER JOIN tunings ON tunings_id = tunings.id WHERE order_id = :id ");
        $query->execute(['id' => $id]);
        return $query->fetch();
    }
    
    public static function productsByOrder($id)
    {
        $query = Connection::make()->prepare("SELECT order_products.order_id, tunings.name, tunings.id as tuning_id, (tunings.price * order_products.count) as price_product_order, order_products.count as product_count, tunings.photo as photo FROM order_products 
        INNER JOIN tunings ON tunings.id = order_products.tunings_id 
        WHERE order_id = :id");
        $query->execute(['id' => $id]);
        return $query->fetchAll();
    }

}
