<?php
include 'admin/config.php';

$tpl = file_get_contents('template.tpl');
$id = $_GET['id'];
$sql = "SELECT * FROM images WHERE id='$id'";
$res = mysqli_query($connect, $sql);
$sqlopened = "UPDATE images SET opened=opened+1 WHERE id=";

if(mysqli_num_rows($res)>0){
    mysqli_query($connect, $sqlopened.$id);
    $data = mysqli_fetch_assoc($res);
    $bigImage = $data["path-big"].$data["filename"];;
    $content = '<img src="'.$bigImage.'">';
    $title = $data["filename"];
}

$patterns = array( '/{title}/', '/{content}/' );
$replace = array( $title, $content );
echo preg_replace( $patterns, $replace, $tpl );
