<?php

if (!isset($_SESSION['auth']) || !$_SESSION["auth"]) {
    header("Location: /app/users/registration.php");
    die();
}

include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php"; ?>
<div class="profileBlock row">
    <div class="profileTitle justify-content-center text-center ">
        <h1>Профиль</h1>
    </div>
</div>
<div class="profile justify-content-center text-center">
    <P>Имя: <?= $user->login ?></P>
    <p>Телефон: <?= $user->phone ?></p>
    <p>E-mail: <?= $user->email ?></p>
</div>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>