<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php"; ?>
<link rel="stylesheet" href="/css/style.css">

<div class="authBlock row ">
    <div class="titleAuth justify-content-center text-center">
        <h2 class="">Авторизация</h2>
    </div>
</div>
<form class="auth-form" action="/app/users/auth_check.php" method="POST">
    <div class="auth m-4 justify-content-center text-center">
        <h2>Введите данные</h2>
        <label for="login">Введите логин</label><br>
        <input type="login" name="login">

        <br><br>
        <label for="password">Введите пароль</label><br>
        <input type="password" name="password" id="password">

        <?php if (!empty($_SESSION['error'])) : ?>

            <p> <?= $_SESSION['error'] ?? "" ?></p>

        <?php endif ?>

        <br><br>
        <button class="btnAuth" name="btnAuth">Войти</button>
        <p>Нет аккаунта?<a href="/app/users/registration.php">Зарегистрироваться</a></p>
    </div>

</form>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>