<?php
include_once "functions.php";
//include_once "../admin/config.php";
session_start();

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
            <div class="product-bio">
                <img src="<?= $good['path']?>" alt="Some image" width="92.5px" height="59px">
                <div class="product-desc">
                    <p class="product-title"><?= $good['name']?></p>
                    <p class="product-quantity"><?= $cartGood['quantity']?></p>
                    <p class="product-single-price">$ <?= $good['price']?> each</p>
                </div>
            </div>
        </div>
    <?}
    ?>
    </div>
<form class="formOrder" method="post" action="#">
        <p> User = <?= $user?></p>

<!--    <input type="text" name="name" placeholder="Введите имя" class="order-name" required>-->

<!--    <input type="text" name="phone" class="rowGoods nameFull" placeholder="Введите номер телефона" required>-->
<!---->
<!--    <input type="email" name="email" placeholder="Email" required>-->
<!---->
<!--    <textarea type="text" name="adress" placeholder="Адрес доставки" required></textarea>-->
<!---->
<!--    <select class="pay" name="pay"">-->
<!--        <option value="0">Cash</option>-->
<!--        <option value="1">Card</option>-->
<!--    </select>-->
<!---->
<!--    <select class="delivery" name="delivery"">-->
<!--        <option value="Pickup">Pickup</option>-->
<!--        <option value="Delivery">Delivery</option>-->
<!--    </select>-->
<!---->
<!--    <textarea type="text" name="comment" placeholder="Комментарий к заказу"></textarea>-->

    <input type="submit" class="buy-btn order-btn" value="Send Order">
</form>
<?php
if (!$_POST['submit']) {
    $phone = trim(strip_tags($_POST['phone']));
    $email = trim(strip_tags($_POST['email']));
    $adress = trim(strip_tags($_POST['adress']));
    $pay = trim(strip_tags($_POST['pay']));
    $delivery = trim(strip_tags($_POST['delivery']));
    $comment = trim(strip_tags($_POST['comment']));


    foreach ($cartGoods as $cartGood){
        $id = $cartGood['id_good'];
        $quantity = $cartGood['quantity'];
//        $t = "INSERT INTO orders (userName, idGoods, quantity, phone, email, address, pay, delivery, comment) VALUES ('%s', '%d', '%d', '%d', '%s', '%s', '%s', '%s', '%s')";
//        $sql = sprintf($t, $user, $id, $quantity, $phone, $email, $adress, $pay, $delivery,$comment);
//
//        $res = mysqli_query($connect, $sql);
        $t = "INSERT INTO orders (userName, idGoods, quantity) VALUES ('%s', '%d', '%d')";  //'%s', '%d', '%d'
        $sql = sprintf($t, $user, $id, $quantity);

        $res = mysqli_query($connect, $sql);
    }





//echo "tyt rabotaet";
//echo "<br>".$user;
//echo "<br>".$quantity;
//echo "<br>".$id;
}
