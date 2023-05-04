<?php

include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php"; ?>
<div class="header row">
    <div class="headerTitle row text-center col-8">
        <h2 class="mt-4">Подарим вашей машине</h2>
        <h2 class="mt-4">вторую жизнь...</h2>
    </div>
</div>

<div class="container-fluid">
    <div class="main row justify-content-center text-center">
    <img class="col-4" src="/upload/carcarich.png">
        <div class="titlesMain col-6 mt-4">
            <h2>Желаете сделать свою машину модной и стильной?</h2>

            <h2>Тогда вам по адресу:</h2>

            <h2>ул.Гагарина д.7</h2>
            <a href="/app/users/order.php" class="linkOrder">Оставить заявку на тюнинг</a>
        </div>
        <img class="col-4" src="/upload/carcarich.png">
    </div>
    <div class="uslugiTitle row justify-content-center text-center" id="uslugiTitle">
        <h1>Наши услуги</h1>
    </div>

    <div class="midMainContainer justify-content-center text-center container-fluid">
        <?php foreach ($products as $item) : ?>
            <div class="midContainer justify-content-center">
                <img src="/upload/tuningType/<?= $item->photo ?>" alt="<?= $item->photo ?>">
                <p><?= $item->name ?></p>
                <p><?= $item->description ?></p>
                
                <button  data-id="<?= $item->id ?>"data-tuning-id="<?php $item->id ?>" class="more">Подробнее</button>
                
                
            </div>
        <?php endforeach ?>
        <a href="/app/tables/showAllUsl.php">Посмотреть все услуги</a>
    </div>
    <div class="akciiTitle row justify-content-center text-center" id="akciiTitle">
        <h1>Акции</h1>
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
            </div>
        <?php endforeach ?>
    </div>

    <div class="whywee row justify-content-center text-center">

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
    <div class="ourWorks row justify-content-center text-center" id="ourWorks">
        <h1>Наши работы</h1>
        
        <div class="ourWorksCont justify-content-center text-center">
            <div class="worksCards justify-content-center text-center">
                <?php foreach($works as $item) : ?>
                    <div class="cardsWorks">
                        <img src="/upload/works/<?= $item->photo_before ?>" alt="<?= $item->photo_before ?>">
                        <img src="/upload/works/<?= $item->photo_after ?>" alt="<?= $item->photo_after ?>"> 
                        <p>До</p>
                        <p>После</p>
                    </div>
                    <?php endforeach ?>
            </div>
        </div>
    </div>


</div>

<div class="orderBtn row text-center col-12">
    <a href="/app/users/order.php" class="linkOrder mt-4">Оставить заявку на тюнинг</a>
</div>


<script src="/assets/fetch.js"></script>
<script src="/assets/loadProducts.check.js"></script>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>