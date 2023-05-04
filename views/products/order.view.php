<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php"; 

session_start();


?>

<div class="headerContOrder row">
    <div class="OrderTitle row text-center col-8">
        <h1>Заявка на тюнинг</h1>
    </div>
</div>

<div class="midOrderCont justify-content-center text-center">
    <form action="/app/users/createReq.php" method="POST">
    <h1>Контактные данные</h1>
        <p class="inputs">Марка машины:  
           
            <select name="mark" >
            <?php foreach($marks as $item) : ?>
                <option value=" <?= $item->id ?>">
                <?= $item->name ?>
                
                </option>
                
                <?php endforeach ?></p>
            </select>
            
    <p class="inputs">Модель машины: <input type="text" name="model" ></p>
    
    <p>Вид тюнинга: 
        <select name="type" class="type">
            <?php foreach($productsOrder as $item) : ?>
            <option value="<?= $item->id ?>"><?= $item->name ?></option>
            <?php endforeach ?>
        </select>
        
    </p>
        <div class="dopSelect">

        </div>
    <button class="orderGo">
        Оформить заявку на тюнинг
    </button>
</form>
</div>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>
<script src="/assets/fetch.js"></script>
<script src="/assets/tunings.js"></script>