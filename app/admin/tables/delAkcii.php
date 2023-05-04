<?php
include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
use App\models\Product;
if(isset($_GET["delAkcii"])){
    Product::delAkcii($_GET["delAkcii"]);
}
if(isset($_GET['delUsl'])){
    Product::delUsl($_GET['delUsl']);
}
header("Location: /app/admin/index.php");