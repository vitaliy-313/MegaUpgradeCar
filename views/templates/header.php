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
                <li class="nav-link"><a href="/">Главная</a></li>
                <li class="nav-link"><a href="/#akciiTitle">Акции</a></li>
                <li class="nav-link"><a href="/app/tables/showAllUsl.php">Услуги</a></li>
                <li class="nav-link"><a href="/#ourWorks">Наши работы</a></li>
            </div>
            <div class="secondNav">
                <li class="nav-link"><a href="/"><img class="logo" src="/upload/logomuc.png" alt=""></a></li>
            </div>
            <div class="thirdNav">
                <p class="textNavNumber">Наш телефон: +7(951) 333-22-11</p>
                <div class="midCont">
                    <?php if (!isset($_SESSION['auth']) || !$_SESSION['auth']) : ?>

                        <li class="nav-link"><a href="/app/users/auth.php">Войти<img src="/upload/user.png"></a></li>

                    <?php else : ?>
                        <li class="nav-link"><a href="/app/users/basket.php">Заказы</a></li>
                        <li class="nav-link"><a href="/app/users/profile.php">Профиль<img src="/upload/user.png"></a></li>
                        <li class="nav-link"><a href="/app/users/logout.php">Выйти</a></li>

                    <?php endif ?>
                </div>

            </div>
        </ul>
    </div>