<?php

include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/header.php"; ?>
<div class="header row">
    <div class="headerTitle row text-center col-8">
        <h2 class="mt-4">Подарим вашей машине</h2>
        <h2 class="mt-4">вторую жизнь...</h2>
    </div>
</div>

<div class="container-fluid">
    <div class="uslugiTitle row justify-content-center text-center" id="uslugiTitle">
        <h1>Наши услуги</h1>
        <a href="/app/admin/tables/createUsluga.php">Добавить услугу</a>
    </div>

    <div class="midMainContainer justify-content-center text-center container-fluid">
        <?php foreach ($products as $item) : ?>
            <div class="midContainer justify-content-center">
                <img src="/upload/tuningType/<?= $item->photo ?>" alt="<?= $item->photo ?>">
                <p><?= $item->name ?></p>
                <p><?= $item->description ?></p>
                
                <button data-id="<?= $item->id ?>"data-tuning-id="<?php $item->id ?>" class="more">Подробнее</button>
                <br>
                <form action="/app/admin/tables/delAkcii.php">
                    <button name="delUsl" value="<?= $item->id ?>">Удалить услугу</button>
                </form>

            </div>
        <?php endforeach ?>
        <a class="checkAllUslugi" href="/app/admin/tables/showAllUslAdmin.php">Посмотреть все услуги</a>
    </div>
    
    <div class="akciiTitle row justify-content-center text-center" id="akciiTitle">
        <h1>Акции</h1>
        <a href="/app/admin/tables/createAkcii.php">Добавить акцию</a>
    </div>
    <div class="midSecondContainer justify-content-center text-center">
        <?php foreach ($stocks as $item) : ?>
            <div class="midSecondCont justify-content-center">
                <img src="/upload/stocks/<?= $item->photo ?>" alt="<?= $item->photo ?>">
                <p><?= $item->name ?></p>
                <p><?= $item->description ?></p>
                <?php if($item->date_end != null):?>
                    <p>Акция действует до <?= $item->date_end ?></p>
                <?php else :?>
                    <p>Акция бессрочна</p>
                <?php endif?>
                <form action="/app/admin/tables/delAkcii.php">
                    <button name="delAkcii" value="<?= $item->id ?>">Удалить акцию</button>
                </form>
            </div>
        <?php endforeach ?>
    </div>

    <div class="whywee justify-content-center text-center">

        <h1>Почему мы?</h1>
        <div class="whyweeCont justify-content-center text-center">
            <div class="contText justify-content-center text-left">
                
                <div class="elements">
                    <?php foreach ($elements as $item) : ?>
                    <p><?= $item->description ?></p>
                <?php endforeach ?>
                </div>
                
            </div>
        </div>
    </div>

    <div class="ourWorks row justify-content-center text-center">
        <h1>Наши работы</h1>
        <a href="/app/admin/tables/createWorks.php">Добавить работу</a>
        
        <div class="ourWorksCont justify-content-center text-center">
            <div class="worksCards justify-content-center text-center">
                <?php foreach($works as $item) : ?>
                    <div class="cardsWorks">
                        <img src="/upload/works/<?= $item->photo_before ?>" alt="<?= $item->photo_before ?>">
                        <img src="/upload/works/<?= $item->photo_after ?>" alt="<?= $item->photo_after ?>">
                        <p>До</p>
                        <p>После</p>
                        <a href="/app/admin/tables/deleteWorks.php?id=<?=$item->id?>">Удалить работу</a>
                    </div>
                    
                    <?php endforeach ?>
            </div>
        </div>
    </div>

</div>

<script src="/assets/fetch.js"></script>
<script src="/assets/loadProducts.check.js"></script>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/footer.php"; ?>