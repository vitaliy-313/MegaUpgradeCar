<?php


use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(isset($_FILES["photo_before"]) && $_FILES["photo_before"]["name"]!=""){ 
    $size = $_FILES["photo_before"]["size"]; 
    $name = $_FILES["photo_before"]["name"]; 
    $tmpname= $_FILES["photo_before"]["tmp_name"]; 
    $error = $_FILES["photo_before"]["error"]; 
    
    $nameInServer1 = time(). "_" .preg_replace("/[\-&\d_#]/","", $name); 
    
    if(move_uploaded_file($tmpname,$_SERVER["DOCUMENT_ROOT"]. "/upload/works/".$nameInServer1)){ 
        $_SESSION["message"] = "файл успешно загружен"; 
    } else{ 
        $_SESSION["errors"]["photo_before"] = "неизвестная ошибка"; } 
} 

if(isset($_FILES["photo_after"]) && $_FILES["photo_after"]["name"]!=""){ 
    $size = $_FILES["photo_after"]["size"]; 
    $name = $_FILES["photo_after"]["name"]; 
    $tmpname= $_FILES["photo_after"]["tmp_name"]; 
    $error = $_FILES["photo_after"]["error"]; 
    
    $nameInServer2 = time(). "_" .preg_replace("/[\-&\d_#]/","", $name); 
    
    if(move_uploaded_file($tmpname,$_SERVER["DOCUMENT_ROOT"]. "/upload/works/".$nameInServer2)){ 
        $_SESSION["message"] = "файл успешно загружен"; 
    } else{ 
        $_SESSION["errors"]["photo_after"] = "неизвестная ошибка"; } 
} 

Product::createWork($nameInServer1, $nameInServer2);

header("Location: /app/admin/index.php");