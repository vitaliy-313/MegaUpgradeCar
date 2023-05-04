<?php

session_start();

use App\models\User;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$user = User::find($_SESSION["id"]);

include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/profile.view.php";