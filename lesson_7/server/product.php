<?php
include_once "../server/functions.php";

$goods = getAll($connect,'goods');

if(isset($_GET['id'])){
    $id= $_GET['id'];
}
$good = getOne($connect, $id, 'goods');


foreach ($goods as $good) {
    ?>
    <div class="progects-blocks-item">
        <a href="../public/showItem.php?id=<?= $good["id"] ?>" target="_blank"><img src="<?= $good["path"] ?>"
                                                                                    alt="<?= $good["name"] ?>"
                                                                                    width="370px" height="237px"></a>
        <div class="progects-blocks-item-wrp progects-blocks-item-wrp-catalog">
            <a href="../public/showItem.php?id=<?= $good["id"] ?>" target="_blank" class="progects-blocks-item-wrp-a">
                <h3 class="progects-blocks-item-wrp-title progects-blocks-item-wrp-title-catalog"><?= $good["name"] ?></h3>
            </a>
            <p class="progects-blocks-item-wrp-text progects-blocks-item-wrp-text-catalog"><?= $good["price"] ?></p>
            <p><?= $good["smallDesc"] ?></p>
            <button class="buy-btn" onclick="addProduct(<?= $good["id"] ?>)"><span class="buy-btn-txt">Buy</span>
            </button>
        </div>
    </div>
<?
}
?>