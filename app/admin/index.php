<?php

use App\models\Category;
use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";


// $categories = Category::all();
$products = Product::all();
$stocks = Product::stocksForAdmin();
$sections = Product::sections();
$elements = Product::elementsSection();
$works = Product::works();

if(!empty($_GET["id"])){
    $moreTuning = Product::moreTuning($_GET["id"]);

}


include $_SERVER["DOCUMENT_ROOT"] ."/views/admin/index.view.php";