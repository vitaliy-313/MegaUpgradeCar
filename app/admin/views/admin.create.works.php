<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/header.php";


?>

<div class="photoCreateWork">
    <h1>Добавить работу</h1>
</div>

<form class="formCreateWork" action="/app/admin/tables/saveWork.php" method="POST" enctype="multipart/form-data">
    <label for="photo_before">Фото до</label>
    <input type="file" name="photo_before">
    <label for="photo_after">Фото после</label>
    <input type="file" name="photo_after">
    <button>Добавить работу</button>
</form>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/footer.php"; ?>