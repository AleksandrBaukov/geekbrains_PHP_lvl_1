<?php
const SERVER = "localhost";
const DB = "gallery";
const LOGIN = "root";
const PASS = "";

$connect = mysqli_connect(SERVER,LOGIN,PASS,DB) or die("Ошибка соединения! ".mysqli_connect_error());

