<?php
include_once "../admin/config.php";
include_once "../server/functions.php";

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
        newTempOrder($connect,$id,1);
    }
}

$cartGoods = getAll($connect, 'cart');

$cartGood = getOneTemp($connect, $id ,'cart');

foreach ($cartGoods as $cartGood){
    $id = $cartGood['id_good'];
    $good= getOne($connect, $id, 'goods');
    $goodsCount += $cartGood['quantity'];
    $sumPrice += $cartGood['quantity']*$good['price'];
//    if($cartGood['quantity'] > 0){
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
if (!$cartGoods){
    echo "Cart is empty.";
}

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