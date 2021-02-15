<?php
include "../admin/config.php";

$tpl = file_get_contents('item.php');
$id = $_GET['id'];
$sql = "SELECT * FROM goods WHERE id='$id'";
$result = mysqli_query($connect, $sql);

if($result){
    $data = mysqli_fetch_assoc($result);
    $name = $data["name"];
    $price = $data["price"];
    $img = $data["path"];
    $desc = $data["fullDesc"];
}

$patterns = array( '/{name}/', '/{img}/', '/{price}/','/{desc}/' );
$replace = array($name, $img, $price, $desc);
echo preg_replace( $patterns, $replace, $tpl );
?>