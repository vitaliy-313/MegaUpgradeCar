<?php

use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

//получаем поток для работы с данными
$stream =file_get_contents("php://input");

if ($stream != null){
    //декодируем полученные данные
    $product_id=json_decode($stream)->data;
    $action = json_decode($stream)->action;
    $user_id= $_SESSION["id"]??"";

    $basketInProduct = match($action){   
        "getTypeTuniug"=> Product::getTuningsByType($product_id),
        "getPrice"=>Product::getPrice($product_id)
    };
    echo json_encode([
        "basketInProduct"=>$basketInProduct,
    ], JSON_UNESCAPED_UNICODE);
}