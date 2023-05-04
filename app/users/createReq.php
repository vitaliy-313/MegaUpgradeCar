<?php

session_start();

use App\models\Product;



require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';


var_dump($_POST);

Product::createRequest($_SESSION["id"], $_POST["mark"], $_POST["model"], $_POST["tuning"]);



header("Location: /app/users/profile.php");