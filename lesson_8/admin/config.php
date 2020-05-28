<?php
const SERVER = "localhost";
const LOGIN = "root";
const PASS = "";
const DB = "online_store";

$connect = mysqli_connect(SERVER,LOGIN,PASS,DB) or die("Ошибка соединения! ".mysqli_connect_error());
?>