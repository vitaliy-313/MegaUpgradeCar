<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/header.php";


?>

<div class="photoCreateAc">
    <h1>Добавить акцию</h1>
</div>

<form class="formCreateAc" action="/app/admin/tables/saveAc.php" method="POST" enctype="multipart/form-data">
    <label for="name">Название</label>
    <input type="text" name="name">
    <label for="des">Описание</label>
    <input type="text" name="des">
    <label for="img">Фотография</label>
    <input type="file" name="img">
    <label for="img">Дата начала</label>
    <input type="date" name="date_start" id="" />
    <label for="img">Дата конца</label>
    <input type="date" name="date_end" id="" />
    <button>Создать акцию</button>
</form>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/footer.php"; ?>