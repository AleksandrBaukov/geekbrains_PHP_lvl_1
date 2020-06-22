<?php if(isset($_GET['name'])){
    $name= $_GET['name'];
}?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Админка</title>
    <link rel="stylesheet" href="../public/css/style.css" type="text/css" media="all">
</head>
<body>
<div class="container">
    <div class="menu">
        <a href="index.php" class="buy-btn admin-btn"><span>Главная</span></a>
        <a href="adding.php" class="buy-btn admin-btn"><span>Добавить товар</span></a>
        <a href="orders.php" class="buy-btn admin-btn"><span>Заказы</span></a>
    </div>
    <div class="content">
        <table>
            <tr><th>id клиента</th>
                <th>имя клиента</th>
                <th>телефон</th>
                <th>почта</th>
                <th>адрес</th>
                <th>способ оплаты</th>
                <th>способ доставки</th>
                <th>комментарий</th>
                <th>время заказа</th></tr>
<!--            <tr><td>1</td></tr>-->
<!--            <tr><td>2</td></tr>-->
            <? include_once "ordersCore.php"?>
        </table>
    </div>
</div>
</body>
</html>