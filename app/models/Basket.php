<?php

namespace app\models;

use App\base\Connection;

class Basket
{
    //получаем корзинку пользователя

    public static  function get_basket($user_id)
    {
        $query = Connection::make()->prepare("SELECT baskets.id as backet_id, users.name as user_name, products.name as product_name, products.image as image, products.price as price, baskets.product_id as baskets_product_id, baskets.count as basket_count FROM baskets INNER JOIN users ON user_id = users.id INNER JOIN products ON product_id = products.id WHERE user_id = :userId ");
        $query->execute([
            "userId" => $user_id
        ]);
        return $query->fetchAll();
    }
    
    public static function find($user_id, $product_id)
    {
        $query = Connection::make()->prepare('SELECT baskets.*, products.price as price FROM baskets INNER JOIN products ON baskets.product_id = products.id WHERE baskets.product_id = :product_id AND baskets.user_id = :user_id');
        $query->execute(['product_id' => $product_id, 'user_id' => $user_id]);
        return $query->fetch();
    }

    public static function totalPrice($user_id)
    {
        $query = Connection::make()->prepare('SELECT SUM(baskets.count*products.price) as sum FROM baskets INNER JOIN products ON baskets.product_id = products.id WHERE baskets.user_id = :user_id');
        $query->execute(['user_id' => $user_id]);
        return $query->fetch(\PDO::FETCH_COLUMN);
    }

    //ищем итоговое кол во товаров
    public static function totalCount($user_id)
    {
        $query = Connection::make()->prepare('SELECT SUM(baskets.count) FROM baskets WHERE baskets.user_id = :user_id');
        $query->execute(['user_id' => $user_id]);
        return $query->fetch(\PDO::FETCH_COLUMN);
    }
    //метод на добавление позиции в корзину
    public static function add($product_id, $user_id)
    {
        //поищем товар в корзине пользователья
        $productInBaskets = self::find($user_id, $product_id);

        //ищем анологичный товар на складе
        $query = Connection::make()->prepare(" SELECT * FROM products WHERE id = :productId");
        $query->execute([
            "productId" => $product_id,
        ]);
        $product = $query->fetch();
        //если товара нет в корзине то мы его добавим его в корзину в кол-ве = 1
        if (!$productInBaskets) {
            $query = Connection::make()->prepare("INSERT INTO baskets (user_id, product_id, count) VALUES (:userId,:productId,1)");
            $query->execute([
                "userId" => $user_id,
                "productId" => $product_id,
            ]);
        }
        //иначе если кол не привысит больше того сколько есть на складе то увеличиваем на 1
        else {
            if ($productInBaskets->count < $product->count) {
                $query = Connection::make()->prepare("UPDATE baskets SET count=count+1 WHERE product_id =:productId AND user_id=:userId");
                $query->execute([
                    "productId" => $product_id,
                    "userId" => $user_id,
                ]);
            }
        }
        return self::find($user_id, $product_id);
    }
    
    public static function deс($product_id, $user_id)
    {
        $productInBaskets = self::find($user_id, $product_id);

        if ($productInBaskets->count > 1) {
            $query = Connection::make()->prepare("UPDATE baskets SET count=count-1 WHERE product_id =:productId AND user_id=:userId");
            $query->execute([
                "productId" => $product_id,
                "userId" => $user_id,
            ]);
        }
        return self::find($user_id, $product_id);
    }

    public static function deleteProduct($product_id, $user_id)
    {

        $query = Connection::make()->prepare("DELETE FROM baskets WHERE product_id =:productId AND user_id=:userId");
        $query->execute([
            "productId" => $product_id,
            "userId" => $user_id,
        ]);
        return "delete";
    }

    public static function clear($user_id)
    {
        $query = Connection::make()->prepare("DELETE FROM baskets WHERE user_id=:userId");
        $query->execute([
            "userId" => $user_id
        ]);
        return $query->fetchAll();
    }
}
