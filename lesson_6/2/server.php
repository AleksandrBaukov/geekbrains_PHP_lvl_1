<?php

$firstint = (int)$_GET["firstint"];
$sign = $_GET["sign"];
$secondint = (int)$_GET["secondint"];

if ($sign == "+") {
    $answer = $firstint + $secondint;
} elseif ($sign == "-") {
    $answer = $firstint - $secondint;
} elseif ($sign == "*") {
    $answer = $firstint * $secondint;
} else
    if ($secondint != 0) {
        $answer = $firstint / $secondint;
    } else $answer = "На ноль делить нельзя!";
