<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">

</head>

<body>
    <div class="container-fluid">
        <ul class="nav navbar" id="nav-bar">
            <div class="firstNav">
                <li class="nav-link"><a href="/app/admin/index.php">Главная</a></li>
            </div>
            <div class="secondNav">
                <li class="nav-link"><a href="/app/admin/index.php"><img class="logo" src="/upload/logomuc.png" alt=""></a></li>
            </div>
            <div class="thirdNav">
                <div class="midCont">
                    <?php if (!isset($_SESSION['admin']) || !$_SESSION['admin']) : ?>

                        <li class="nav-link"><a href="/app/admin/auth.php">Войти<img src="/upload/user.png"></a></li>

                    <?php else : ?>
                        <li class="nav-link"><a href="/app/admin/tables/request.php">Заказы</a></li>
                        <li class="nav-link"><a href="/app/admin/profile.php">Профиль</a></li>
                        <li class="nav-link"><a href="/app/users/logout.php">Выйти</a></li>

                    <?php endif ?>
                </div>

            </div>
        </ul>
    </div>