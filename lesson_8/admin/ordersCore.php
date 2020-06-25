<?php
include_once "../server/functions.php";

if(isset($_GET['fio'])){
    $fio= $_GET['fio'];
}
$orders = managerOrders($connect, $fio);
foreach ($orders as $order){?>
    <tr>
        <td><?= $order['idClient']?></td>
        <td><?= $order['fio']?></td>
        <td><?= $order['phone']?></td>
        <td><?= $order['email']?></td>
        <td><?= $order['address']?></td>
        <td><?= $order['pay']?></td>
        <td><?= $order['delivery']?></td>
        <td><?= $order['comment']?></td>
        <td><?= $order['time']?></td>
    </tr>
<?}