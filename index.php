<?php

use App\models\Category;
use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";


// $categories = Category::all();
$products = Product::all();
$stocks = Product::stocks();
$sections = Product::sections();
$elements = Product::elementsSection();
if(isset($_GET["id"])){
    $moreTuning = Product::moreTuning($_GET["id"]);
}

$works = Product::works();
// var_dump($products);

include $_SERVER["DOCUMENT_ROOT"] ."/views/products/index.view.php";