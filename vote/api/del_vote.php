<?php 
include_once "../db.php"; //連接資料庫

$pdo->exec("delete from `topics` where `id` = '{$_GET['id']}'"); //刪除主題
$pdo->exec("delete from `options` where `subject_id` = '{$_GET['id']}'"); //刪除該主題的選項
header("location:../backend.php");