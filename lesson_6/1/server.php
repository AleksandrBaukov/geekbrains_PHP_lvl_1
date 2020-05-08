<?php
$firstint = (int)$_GET["firstint"];
$sign = $_GET["signs"];
$secondint = (int)$_GET["secondint"];

if ($sign == "plus"){
    $answer = $firstint + $secondint;
} elseif ($sign == "minus"){
    $answer = $firstint - $secondint;
} elseif ($sign == "mult"){
    $answer = $firstint * $secondint;
} else
    if($secondint != 0){
        $answer = $firstint / $secondint;
    } else $answer = "На ноль делить нельзя!";
?>