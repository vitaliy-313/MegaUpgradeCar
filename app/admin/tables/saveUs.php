<?php


use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";


if(isset($_FILES["img"]) && $_FILES["img"]["name"]!=""){ 
    $size = $_FILES["img"]["size"]; 
    $name = $_FILES["img"]["name"]; 
    $tmpname= $_FILES["img"]["tmp_name"]; 
    $error = $_FILES["img"]["error"]; 
    
    $nameInServer = time(). "_" .preg_replace("/[\-&\d_#]/","", $name); 
    
    if(move_uploaded_file($tmpname,$_SERVER["DOCUMENT_ROOT"]. "/upload/tuningType/".$nameInServer)){ 
        $_SESSION["message"] = "файл успешно загружен"; 
    } else{ 
        $_SESSION["errors"]["img"] = "неизвестная ошибка"; } } 
        


Product::createUs($_POST["des"], $_POST["name"], $nameInServer);

header("Location: /app/admin/index.php");
