<?php

include_once "../db.php";

$opt=$_POST['desc'];
$subject_id=$_POST['subject_id'];

$pdo->exec("update `options` set `total`=`total`+1 where `id`='$opt'"); //統計投票使用>投一票加一票

header("location:../index.php");