<?php

use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$products = Product::allNoLimit();


include $_SERVER["DOCUMENT_ROOT"] ."/views/products/showAllUsl.view.php";