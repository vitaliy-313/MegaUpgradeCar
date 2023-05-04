<?php

include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php"; ?>
    <div class="midMainContainer justify-content-center text-center container-fluid">
        <?php foreach ($products as $item) : ?>
            <div class="midContainer justify-content-center">
                <img src="/upload/tuningType/<?= $item->photo ?>" alt="<?= $item->photo ?>">
                <p><?= $item->name ?></p>
                <p><?= $item->description ?></p>
                
                <button  data-id="<?= $item->id ?>"data-tuning-id="<?php $item->id ?>" class="more">Подробнее</button>
                
                
            </div>
        <?php endforeach ?>
        <a href="/">Назад</a>
    </div>



</div>

<div class="orderBtn row text-center col-12">
    <a href="/app/users/order.php" class="linkOrder mt-4">Оставить заявку на тюнинг</a>
</div>


<script src="/assets/fetch.js"></script>
<script src="/assets/loadProducts.check.js"></script>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>