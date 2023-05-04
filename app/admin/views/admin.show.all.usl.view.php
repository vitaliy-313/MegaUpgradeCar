<?php

include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/header.php"; ?>

<div class="photoUsl">
    <div class="UslugiTitle">
        <h1>Все услуги</h1>
    </div>
</div>

<a href="/app/admin/tables/createUsluga.php">Добавить услугу</a>
    <div class="midMainContainer justify-content-center text-center container-fluid">
        <?php foreach ($products as $item) : ?>
            <div class="midContainer justify-content-center">
                <img src="/upload/tuningType/<?= $item->photo ?>" alt="<?= $item->photo ?>">
                <p><?= $item->name ?></p>
                <p><?= $item->description ?></p>
                
                <button  data-id="<?= $item->id ?>"data-tuning-id="<?php $item->id ?>" class="more">Подробнее</button>
                <form action="/app/admin/tables/delAkcii.php">
                    <button name="delUsl" value="<?= $item->id ?>">Удалить услугу</button>
                </form>
                
            </div>
        <?php endforeach ?>
        <a class="backUsl" href="/app/admin/">Назад</a>
    </div>



</div>


<script src="/assets/fetch.js"></script>
<script src="/assets/loadProducts.check.js"></script>