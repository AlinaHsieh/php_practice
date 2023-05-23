<?php

echo $_COOKIE['name'];

session_start();//$_SESSION要先啟動，沒辦法直接echo $_SESSION
// $_SESSION['name']='mack';
echo $_SESSION['name'];

?>