<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/header.php";


?>

<div class="photoCreateUs">
    <h1>Добавить услугу</h1>
</div>

<form class="formCreateUs" action="/app/admin/tables/saveUs.php" method="POST" enctype="multipart/form-data">
    <label for="name">Название</label>
    <input type="text" name="name">
    <label for="des">Описание</label>
    <input type="text" name="des">
    <label for="img">Фотография</label>
    <input type="file" name="img">
    <button>Создать услугу</button>
</form>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/footer.php"; ?>