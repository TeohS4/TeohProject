<?php   
session_start();
unset($_SESSION["user_info"]);
header("location:login.php");
?>