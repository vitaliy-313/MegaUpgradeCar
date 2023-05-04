<?php
session_start();

use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";


$requests = Product::getAllRequest();

$statuses = Product::getAllStatus();



include $_SERVER["DOCUMENT_ROOT"]."/app/admin/views/admin.request.view.php"; 