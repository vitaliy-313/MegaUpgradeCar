<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php"; ?>

<script defer src="script.js"></script>

<div class="registrationBlock row ">
    <div class="titleRegistration justify-content-center text-center">
        <h2 class="">Регистрация</h2>
    </div>

</div>
<form action="/app/users/insert.php" method="POST">
    <div class="register m-4 justify-content-center text-center">
        <h1 class="">Введите данные</h1>

        <p>Логин</p>
        <input type="text" name="login" value="<?= $_SESSION['save-info']['login'] ?? "" ?>">
        <p style="color:red;"><?= $_SESSION["error"]["login"] ?? "" ?></p>

        <p>E-mail</p>
        <input type="email" name="email" value="<?= $_SESSION['save-info']['email'] ?? "" ?>">
        <p style="color:red;"><?= $_SESSION["error"]["email"] ?? "" ?></p>

        <p>Пароль</p>
        <input type="password" name="password" id="password">
        <p style="color:red;"><?= $_SESSION["error"]["password"] ?? "" ?></p>

        <p>Подтвердите пароль</p>
        <input type="password" name="password_confirmation" id="password_confirmation">
        <p style="color:red;"><?= $_SESSION["error"]["confirmation"] ?? "" ?></p>
        <p style="color:red;"><?= $_SESSION["error"]["reg"] ?? "" ?></p>

        <p>Номер телефона</p>
        <input type="tel" name="phone" id="phone">
        <p style="color:red;"><?= $_SESSION["error"]["phone"] ?? "" ?></p>

        <br><br>
        <label for="agreement">Согласен на обработку Пер.Данных</label>
        <input type="checkbox" id="agreement" name="agreement" checked>

        <br><br>
        <button class="btnRegister" name="btn">Регистраиця</button>
    </div>

</form>

<?php
unset($_SESSION['error']);
unset($_SESSION);
session_destroy();
include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>