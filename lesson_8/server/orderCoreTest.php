<?php
include "../admin/config.php";
session_start();
$user = $_SESSION['login'];
$quantity = $cartGood['quantity'];
$id = $cartGood['id_good'];

if (!$_POST['submit']) {
    echo "tyt rabotaet";
    echo "<br>".$user;
    echo "<br>".$quantity;
    echo "<br>".$id;

    $name = trim(strip_tags($_POST['name']));
    $phone = trim(strip_tags($_POST['phone']));
    $email = trim(strip_tags($_POST['email']));
    $address = trim(strip_tags($_POST['address']));
    $pay = trim(strip_tags($_POST['pay']));
    $delivery = trim(strip_tags($_POST['delivery']));
    $comment = trim(strip_tags($_POST['comment']));

    $sql = "INSERT INTO clients (name, phone, email, adress, pay, delivery, comment) VALUES ('%s', '%d', '%s', '%s', '%s', '%s', '%s')";

    $query = sprintf($sql, $name, $phone, $email, $address ,$pay, $delivery, $comment);

    $result = mysqli_query($connect, $sql);

    if(!$result)
        die(mysqli_error($connect));

    while($cartGood > 0){

    $t = "INSERT INTO orders (userName, idGoods, quantity) VALUES ($user, $id, $quantity)";  //'%s', '%d', '%d'
    //$sqli = sprintf($connect, $user, $id, $quantity);

    $res = mysqli_query($connect, $t);
    }

}

