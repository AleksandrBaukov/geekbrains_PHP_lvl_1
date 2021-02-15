<?php
include_once "../server/functions.php";

if(isset($_GET['fio'])){
    $fio= $_GET['fio'];
}
$goods = managerGoods($connect, $fio);
?>
<?
foreach ($goods as $good){?>
    <tr>
        <td><?= $good['quantity']?></td>
        <td><?= $good['name']?></td>
        <td><?= $good['price']?></td>
    </tr>
    <?$price += $good['price'];?>
<?}?>



<!--<tr>-->
<!--    <td>--><?//= $orders[0]['idClient']?><!--</td>-->
<!--    <td>--><?//= $orders[0]['fio']?><!--</td>-->
<!--    <td>--><?//= $orders[0]['phone']?><!--</td>-->
<!--    <td>--><?//= $orders[0]['email']?><!--</td>-->
<!--    <td>--><?//= $orders[0]['address']?><!--</td>-->
<!--    <td>--><?//= $orders[0]['pay']?><!--</td>-->
<!--    <td>--><?//= $orders[0]['delivery']?><!--</td>-->
<!--    <td>--><?//= $orders[0]['comment']?><!--</td>-->
<!--    <td>--><?//= $orders[0]['time']?><!--</td>-->
<!--</tr>-->