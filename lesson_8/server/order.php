<?php
//include_once "functions.php";
include_once "orderCore.php";
session_start();

if(isset($_SESSION['login'])){
    $user = $_SESSION['login'];
} else $user = "new user";

if(isset($_POST['id'])){
    $id = (int)($_POST['id']);

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

if (!$cartGoods){
    echo "Cart is empty.";
} else ?>
    <div class="order-block">
    <?foreach ($cartGoods as $cartGood){
        $id = $cartGood['id_good'];
        $good= getOne($connect, $id, 'goods');
        $goodsCount += $cartGood['quantity'];
        $sumPrice += $cartGood['quantity']*$good['price'];?>
        <div class="cart-item">
                <img src="<?= $good['path']?>" alt="Some image" width="92.5px" height="59px">
                <div class="product-desc">
                    <p class="product-title"><?= $good['name']?></p>
                    <p class="product-quantity"><?= $cartGood['quantity']?></p>
                    <p class="product-single-price">$ <?= $good['price']?> each</p>
                </div>
                <button class="del-btn" onclick="delProduct(<?= $good["id"] ?>)"><i class="fa fa-trash" aria-hidden="true"></i></button>
        </div>
    <?}
    ?>
    </div>
<form class="formOrder" method="post" action="#">
    <input type="text" name="name" placeholder="Введите имя" class="order-name" required>
    <input type="text" name="phone" class="rowGoods nameFull" placeholder="Введите номер телефона" required>
    <input type="email" name="email" placeholder="Email" required>
    <textarea type="text" name="address" placeholder="Адрес доставки" required></textarea>
    <select class="pay" name="pay"">
        <option value="Cash">Cash</option>
        <option value="Card">Card</option>
    </select>
    <select class="delivery" name="delivery"">
        <option value="Pickup">Pickup</option>
        <option value="Delivery">Delivery</option>
    </select>
    <textarea type="text" name="comment" placeholder="Комментарий к заказу"></textarea>
    <input type="submit" name="submit" class="buy-btn order-btn" value="Send Order">
</form>
<?php
//if ($_POST['submit']) {
//    $name = trim(strip_tags($_POST['name']));
//    $phone = trim(strip_tags($_POST['phone']));
//    $email = trim(strip_tags($_POST['email']));
//    $address = trim(strip_tags($_POST['address']));
//    $pay = trim(strip_tags($_POST['pay']));
//    $delivery = trim(strip_tags($_POST['delivery']));
//    $comment = trim(strip_tags($_POST['comment']));
//
//    newClient($connect,$user, $name, $phone, $email, $address, $pay, $delivery, $comment);
//    foreach ($cartGoods as $cartGood){
//        $id = $cartGood['id_good'];
//        $quantity = $cartGood['quantity'];
//
//        createOrder($connect, $name, $id, $quantity);
//        deleteFromCart($connect, $id);
//    }
//    header("Location: orderEnd.php");
//}