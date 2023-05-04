<?php

use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

Product::deleteWork($_GET["id"]);

header("Location: /app/admin/index.php");