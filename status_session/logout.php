<?php
include_once('comm.php');
/*
session_start();
echo "已登出使用者". $_SESSION['name'];
unset($_SESSION['name']);//登出使用者:把$_SESSION刪掉(使用unset函數)
*/


unset($_SESSION['error']); //登出重設$_SESSION的error跟login值
unset($_SESSION['login']);
header("location:login.php");

?>