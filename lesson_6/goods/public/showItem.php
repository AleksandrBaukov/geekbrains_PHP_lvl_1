<?php
include "../admin/config.php";

$tpl = file_get_contents('item.php');
$id = $_GET['id'];
$sql = "SELECT * FROM goods WHERE id='$id'";
$res = mysqli_query($connect, $sql);

if($res){
    $data = mysqli_fetch_assoc($res);
    $name = $data["name"];
    $price = $data["price"];
    $img = $data["path"];
    $desc = $data["full-desc"];
}

$patterns = array( '/{name}/', '/{img}/', '/{price}/','/{desc}/' );
$replace = array($name, $img, $price, $desc);
echo preg_replace( $patterns, $replace, $tpl );
?>