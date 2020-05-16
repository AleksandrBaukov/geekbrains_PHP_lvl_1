<?php
include "../admin/config.php";
if($_POST['submit']){
    $fio = trim(strip_tags($_POST['fio']));
    $email = trim(strip_tags($_POST['email']));
    $text = trim(strip_tags($_POST['text']));

    $t = "INSERT INTO comments (fio, email, text) VALUES ('%s','%s','%s')";

    $query = sprintf($t, mysqli_real_escape_string($connect, $fio),mysqli_real_escape_string($connect, $email),mysqli_real_escape_string($connect, $text));

    $result = mysqli_query($connect, $query);

}

function comments_all($connect){
    $query = "SELECT * FROM comments order by id desc";
    $result = mysqli_query($connect, $query);

    if(!$result)
        die(mysqli_error($connect));

    $n = mysqli_num_rows($result);
    $comments = array();

    for($i = 0; $i < $n; $i++){
        $row = mysqli_fetch_assoc($result);
        $comments[] = $row;
    }
    return $comments;
}
?>