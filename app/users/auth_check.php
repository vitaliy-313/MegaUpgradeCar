<?php

use App\models\User;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
unset($_SESSION['error']);

if (isset($_POST['btnAuth'])) {
    $user = User::getUser($_POST['login'], $_POST['password']);
    if ($user == null) {
        $_SESSION['auth'] = false;
        $_SESSION['error'] = "Пользователь не найден";
        header("Location: /app/users/auth.php");
        die();
    } else if ($user->role == "Администратор") {
        $_SESSION["admin"] = true;
        $_SESSION["id"] = $user->id;
        header("Location: /app/admin/profile.php");
    } else {
        $_SESSION['auth'] = true;
        $_SESSION['id'] = $user->id;
        header("Location: /app/users/profile.php");
    }
}
