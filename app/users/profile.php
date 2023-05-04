<?php

session_start();

use App\models\User;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";


if (!isset($_SESSION['auth']) || !$_SESSION["auth"]) {
    header("Location: /app/users/registration.php");
    die();
}

$user = User::find($_SESSION["id"]);
include $_SERVER["DOCUMENT_ROOT"] . "/views/users/profile.view.php";