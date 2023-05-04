<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";

?>

<div class="headerBasket row">
    <div class="OrderTitle row text-center col-8">
        <h1>Заявки на тюнинг</h1>
    </div>
</div>
<div class="reqUserCont">
    
        <div class="reqUser">
            <table class="tableUserBasket">

                <tr class="trTitlebasketUser">
                    <th>Заявка№</th>
                    <th>Марка</th>
                    <th>Тип тюнинга</th>
                    <th>Дата подачи</th>
                    <th>Статус</th>
                    <th>model</th>
                    <th>price</th>
                    <th>Вид тюнинга</th>
                </tr>
<?php foreach ($reqUser as $item) : ?>
                <tr>
                    
                    <td><?= $item->reqid ?></td>
                    <td><?= $item->name_mark ?></td>
                    <td><?= $item->types_tunings_name ?></td>
                    <td><?= (new DateTime($item->created_at))->format('d.m.Y') ?></td>
                    <td><?= $item->name_status ?></td>
                    <td><?= $item->model ?></td>
                    <td><?= $item->price ?></td>
                    <td><?= $item->tuning_name ?></td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>
    
</div>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>