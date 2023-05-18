<?php
//資料庫連線用的檔案，統一連此檔案，方便之後管理
$dsn="mysql:host=localhost;charset=utf8;dbname=vote";
$pdo=new PDO($dsn,'root','');
?>
