<?php
include_once "functions.php";
session_start();

if(isset($_SESSION['login'])){
    $user = $_SESSION['login'];
} else $user = "new user";

if ($_POST['submit']) {
    $name = trim(strip_tags($_POST['name']));
    $phone = trim(strip_tags($_POST['phone']));
    $email = trim(strip_tags($_POST['email']));
    $address = trim(strip_tags($_POST['address']));
    $pay = trim(strip_tags($_POST['pay']));
    $delivery = trim(strip_tags($_POST['delivery']));
    $comment = trim(strip_tags($_POST['comment']));

    newClient($connect,$user, $name, $phone, $email, $address, $pay, $delivery, $comment);
    foreach ($cartGoods as $cartGood){
        $id = $cartGood['id_good'];
        $quantity = $cartGood['quantity'];

        createOrder($connect, $name, $id, $quantity);
        deleteFromCart($connect, $id);
    }
    //header("Location: orderEnd.php");   не работает почему то
}