<?php

use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$products = Product::allNoLimit();
// var_dump($tunings);

include $_SERVER["DOCUMENT_ROOT"] ."/app/admin/views/admin.show.all.usl.view.php";