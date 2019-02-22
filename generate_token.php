<?php
$token=$_GET["token"];
session_start();
$_SESSION["token"]=$token;
header("location:calender.php");
?>