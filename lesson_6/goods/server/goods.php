<?php
include "../admin/config.php";
$sql = "SELECT * FROM goods";
$res = mysqli_query($connect, $sql);

if($res){
    while ($data = mysqli_fetch_assoc($res)){
        $id = $data["id"];
        $name = $data["name"];
        $price = $data["price"];
        $img = $data["path"];
        $desc = $data["small-desc"];?>
        <div class="progects-blocks-item">
            <a href="../public/showItem.php?id=<?= $id?>" target="_blank"><img src="<?= $img?>" alt="<?= $name?>" width="370px" height="237px"></a>
            <div class="progects-blocks-item-wrp progects-blocks-item-wrp-catalog">
                <a href="../public/showItem.php?id=<?= $id?>" target="_blank" class="progects-blocks-item-wrp-a"><h3 class="progects-blocks-item-wrp-title progects-blocks-item-wrp-title-catalog"><?= $name?></h3></a>
                <p class="progects-blocks-item-wrp-text progects-blocks-item-wrp-text-catalog"><?= $price?></p>
                <p><?= $desc?></p>
                <button class="buy-btn"><span class="buy-btn-txt">Buy</span></button>
            </div>
        </div>
    <?}
}
?>