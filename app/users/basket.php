<?php

use App\models\Order;
use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$reqUser = Product::getReqUser($_SESSION["id"]);
// var_dump($_SESSION["id"]);

include $_SERVER["DOCUMENT_ROOT"] . "/views/users/basket.view.php";