<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/header.php";


?>

<div class="photoReq">
    <div class="reqBasketAdmin">
        <h1>Заявки клиентов</h1>
    </div>

</div>
<div class="reqUserCont">
    

        <div class="reqUser">
            <table class="tableAdminBasket">
                <tr class="trTitlebasketUser">
                    <th>Заявка №</th>
                    <th>Клиент</th>
                    <th>Марка</th>
                    <th>Тип тюнинга</th>
                    <th>Дата подачи</th>
                    <th>model</th>
                    <th>price</th>
                    <th>Вид тюнинга</th>
                    <th>Статус</th>
                    <th>Действия</th>
                </tr>
                <?php foreach ($requests as $requests) : ?>
                <tr>
                    <td><?= $requests->reqid ?></td>
                    <td><?= $requests->login ?></td>
                    <td><?= $requests->name_mark ?></td>
                    <td><?= $requests->types_tunings_name ?></td>
                    <td><?= (new DateTime($requests->created_at))->format('d.m.Y') ?></td>
                    
                    <td><?= $requests->model ?></td>
                    <td><?= $requests->price ?></td>
                    <td><?= $requests->tuning_name ?></td>
                    <td><?= $requests->name_status ?></td>
                    <td>
                        <form action="/app/admin/tables/editStatusReq.php" method="POST">
                            <select name="status">
                                <?php foreach ($statuses as $item) : ?>
                                    <option value="<?= $item->id ?>"><?= $item->name_status ?></option>
                                <?php endforeach ?>
                            </select>
                            <button name="idreq" value="<?= $requests->reqid ?>">сохранить</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>
    
</div>


<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/footer.php"; ?>