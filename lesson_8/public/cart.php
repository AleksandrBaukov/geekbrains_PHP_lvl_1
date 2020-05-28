<?php
session_start();
include_once "../admin/config.php";
include_once "../server/functions.php";

if(isset($_SESSION['login'])){
    $user = $_SESSION['login'];
}
if(isset($_POST['id'])){
    $id = (int)($_POST['id']);

    $good = getOne($connect, $id, 'goods');//массив из 1 товара

    $goodTemp = getOneTemp($connect, $id, 'cart');



    if(isset($goodTemp)){
        $id = $goodTemp['id_good'];
        $quantity = $goodTemp['quantity'];
        $quantity++;
        editTempOrder($connect, $id, $quantity);
    }else{
        newTempOrder($connect,$id,1, $user);
    }
}

$cartGoods = getAllFromCart($connect, $user);

$cartGood = getOneTemp($connect, $id ,'cart');

?>
<div class="head-icons">
    <div>
        <button class="icon-cart" type="button" ><span class="icon-cart-btn-count"></span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 18 24">
                <path d="M17.994 5.997v14.998a3 3 0 0 1-2.999 3H3.002a3 3 0 0 1-2.999-3V5.997A2.999 2.999 0 0 1 3.002 3H4.5c0-1.657 2.013-3 4.498-3 2.484 0 4.497 1.343 4.497 3h1.5a2.999 2.999 0 0 1 2.998 2.998zM6 3h5.997c0-1.037-1.342-1.5-2.998-1.5-1.656 0-2.999.463-2.999 1.5zm10.495 16.496H1.502v1.5c0 .828.672 1.5 1.5 1.5h11.993a1.5 1.5 0 0 0 1.5-1.5zm0-13.498a1.5 1.5 0 0 0-1.5-1.5h-1.499v4.5h-1.499v-4.5H6v4.5H4.501v-4.5h-1.5a1.5 1.5 0 0 0-1.499 1.5v11.998h14.993z" />
                <path d="M17.994 5.997v14.998a3 3 0 0 1-2.999 3H3.002a3 3 0 0 1-2.999-3V5.997A2.999 2.999 0 0 1 3.002 3H4.5c0-1.657 2.013-3 4.498-3 2.484 0 4.497 1.343 4.497 3h1.5a2.999 2.999 0 0 1 2.998 2.998zM6 3h5.997c0-1.037-1.342-1.5-2.998-1.5-1.656 0-2.999.463-2.999 1.5zm10.495 16.496H1.502v1.5c0 .828.672 1.5 1.5 1.5h11.993a1.5 1.5 0 0 0 1.5-1.5zm0-13.498a1.5 1.5 0 0 0-1.5-1.5h-1.499v4.5h-1.499v-4.5H6v4.5H4.501v-4.5h-1.5a1.5 1.5 0 0 0-1.499 1.5v11.998h14.993z" /></svg>
            <span class="icon-cart-count"></span>
        </button>
        <div class="cart-block invisible">
<?
if (!$cartGoods){
    echo "Cart is empty.";
} else
foreach ($cartGoods as $cartGood){
    $id = $cartGood['id_good'];
    $good= getOne($connect, $id, 'goods');
    $goodsCount += $cartGood['quantity'];
    $sumPrice += $cartGood['quantity']*$good['price'];
    ?>
                <div class="cart-item">
                    <div class="product-bio">
                        <img src="<?= $good['path']?>" alt="Some image" width="92.5px" height="59px">
                        <div class="product-desc">
                            <p class="product-title"><?= $good['name']?></p>
                            <p class="product-quantity"><?= $cartGood['quantity']?></p>
                            <p class="product-single-price">$ <?= $good['price']?> each</p>
                        </div>
                    </div>
                    <div class="right-block">
                        <p class="product-price"><?= ($cartGood['quantity']*$good['price']);?> $</p>
                        <button class="del-btn" onclick="delProduct(<?= $good["id"] ?>)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </div>
                </div>
<?}
?>
            <span class="counter">Items in Cart : <span class="counter-item"><?= $goodsCount?></span></span>
            <span class="priceCounter">Total amount : <span class="priceCounter-item"><?= $sumPrice?> $</span></span>
            <a href="order.php" class="buy-btn"><span class="buy-btn-txt">Order</span></a>
        </div>
    </div>
    <form action="#" class="head-form">
        <input type="search" placeholder="search">
        <button type="submit"></button>
    </form>
</div>
<?

if(isset($_POST['del-id'])){
    $id = (int)($_POST['del-id']);

    $good = getOne($connect, $id, 'goods');//массив из 1 товара

    $goodTemp = getOneTemp($connect, $id, 'cart');

    if($goodTemp['quantity'] == 1){
        $id = $goodTemp['id_good'];
        deleteOneTemp($connect,$id);
    } else {
        $quantity = $goodTemp['quantity'];
        $quantity--;
        editTempOrder($connect, $id, $quantity);
    }
}

?>

