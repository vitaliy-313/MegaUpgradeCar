<?php
session_start();

use App\models\User;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

var_dump($_SESSION);
if (isset($_POST["btnRegister"])) {

    //имя

    if (!preg_match('/^[А-ЯЁ][а-яё]+$/u', $_POST['login'])) {
        $_SESSION['error']['login'] = 'Логин введен некорректно';
        if ($_POST["login"] == null) {
            $_SESSION["error"]["login"] = "заполните поле";
            header("Location: /app/users/registration.php");
        }
    }
    }
    //почта
    $san = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if (!filter_var($san, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error"]["email"] = "почта введена некорректно";
        if ($_POST["email"] == null) {
            $_SESSION["error"]["email"] = "заполните поле";
            header("Location: /app/users/registration.php");
        }
    }
    //пароль
    if ($_POST["password"] == null) {
        $_SESSION["error"]["password"] = "заполните поле";
    } else {
        if ($_POST["password"] == $_POST["password_confirmation"]) {
            if (User::getUser($_POST["login"], $_POST["password"]) == null) {
                if (User::store($_POST)) {
                    $user = User::getUser($_POST["login"], $_POST["password"]);
                    $_SESSION["auth"] = true;
                    $_SESSION["id"] = $user->id;
                    $_SESSION["login"] = $_POST["login"];
                    header("Location: /");
                    die();
                }
            } else {
                $_SESSION["save-info"]["login"] = $_POST["login"];
                $_SESSION["save-info"]["email"] = $_POST["email"];
                $_SESSION["auth"] = false;
                $_SESSION["error"]["reg"] = "вы уже зарегистрированы";
                header("Location: /app/users/registration.php");
                die();
            }
        } else {
            $_SESSION["save-info"]["login"] = $_POST["login"];
            $_SESSION["save-info"]["email"] = $_POST["email"];
            $_SESSION["auth"] = false;
            header("Location: /app/users/registration.php");
            die();
        }
    }