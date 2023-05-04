<?php

use App\models\Order;
use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$marks = Order::all();
// $products = Product::all();
$productsOrder = Product::order();

include $_SERVER["DOCUMENT_ROOT"] ."/views/products/order.view.php";