<?php

session_start();

use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

var_dump($_POST);
Product::editStatusReq($_POST["status"], $_POST["idreq"]);

header("Location: /app/admin/tables/request.php");


