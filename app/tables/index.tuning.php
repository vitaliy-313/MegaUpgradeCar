<?php

use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$tunings = Product::find($_GET["id"]);


include $_SERVER["DOCUMENT_ROOT"] ."/views/products/index.view.php";