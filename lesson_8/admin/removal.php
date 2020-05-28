<?php
include_once "../server/functions.php";
if($_GET['id']){
    $id= $_GET['id'];
    delete($connect, $id,'goods');
    //надо еще удалять картинки
    header("Location: ../admin/index.php");
}