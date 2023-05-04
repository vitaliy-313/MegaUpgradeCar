<?php
use App\models\Product;
session_start();


require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
use app\models\Order;
$stream = file_get_contents("php://input");
if($stream != null){
        //декодируем полученые данные

            $data = json_decode($stream)->data;
            // $user_id = $_SESSION["user"]["id"];
            $action = json_decode($stream)->action;
            // var_dump($data);
            // var_dump($stream);
            // var_dump($stream);
                $recipe = match($action){
                   "more"=> Product::more($data),
                };

            echo json_encode([
                "productInBasket"=>$recipe,
            ], JSON_UNESCAPED_UNICODE);


}