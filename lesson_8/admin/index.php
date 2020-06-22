<?php include_once "../server/functions.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Админка</title>
    <link rel="stylesheet" href="../public/css/style.css" type="text/css" media="all">
</head>
<body>
<div class="container">
    <?php
    if(!($_SESSION['login'] == 'admin')) {
    echo "Вы не вошли или вы не Админ!";}
    else{
//        print_r($_SESSION['login']) ;
    ?>
            <div class="menu">
                    <a href="../public/index.php" class="buy-btn admin-btn"><span>Сайт</span></a>
                    <a href="index.php" class="buy-btn admin-btn"><span>Главная</span></a>
                    <a href="adding.php" class="buy-btn admin-btn"><span>Добавить товар</span></a>
                    <a href="orders.php" class="buy-btn admin-btn"><span>Заказы</span></a>
            </div>

    <div class="admin-content">
        <h1>Админка</h1>
        <div class="admin-block">
        <?
        $goods = getAll($connect, 'goods');
        if ($goods) {
            foreach ($goods as $good) {
                ?>
                <div class="admin-item">
                    <img src="../public/<?= $good['path'] ?>" alt="<?= $good['name'] ?>" title="<?= $good['name'] ?>" width="375px" height="250px">
                    <div>
                        <h3 class="item-name"><?= $good['name'] ?></h3>
                        <a href="editing.php?id=<?= $good['id'] ?>" title="Редактировать" class="buy-btn">Редактировать</a>
                        <br>
                        <a href="removal.php?id=<?= $good['id'] ?>" title="Удалить" class="buy-btn">Удалить</a>
                    </div>
                </div>
                <?
            }
        }?>
        </div>
        <?}
        ?>
    </div>
</div>
</body>
</html>
