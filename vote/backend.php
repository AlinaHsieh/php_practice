<?php include_once "db.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理後台</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .time-set {
            display: flex;
            width: 70%;
            min-width: 615px;
            justify-content: space-between;
        }

        .time-item {
            margin: 5px 0;
        }

        .subject-input {
            font-family: '微軟正黑體', Arial, Helvetica, sans-serif;
            padding: 3px;
            font-size: 16px;
            width: 50%;
        }

        main {
            width: 60%;
            margin: auto;
        }

        .topic-list {
            list-style-type: none;
        }

        .list-row {
            display: flex;
            width: 100%;
        }

        .list-row div:not(1) {
            text-align: center;
        }

        .list-item-title:nth-child(1),
        .list-item:nth-child(1) {
            width: 40%;
        }

        .list-item-title:nth-child(2),
        .list-item:nth-child(2) {
            width: 5%;
        }

        .list-item-title:nth-child(3),
        .list-item:nth-child(3) {
            width: 15%;
        }

        .list-item-title:nth-child(4),
        .list-item:nth-child(4) {
            width: 5%;
        }

        .list-item-title:nth-child(5),
        .list-item:nth-child(5) {
            width: 25%;
        }
    </style>
</head>

<body>

    <header>
        <a href="index.php">首頁</a>
        <a href="./front/logout.php">登出</a>
        <nav>
             <a href='./backend.php?do=add_vote'>新增投票</a>     
             <!-- <a href="./back/add_vote.php">新增投票</a> -->
            <a href='./backend.php?do=query_vote'>結果查詢</a>
            <!-- <a href="./back/query_vote.php">結果查詢</a> -->
        </nav>
    </header>
    <main>
        <?php

        /*  if(isset($_GET['do'])){
            $file="./back/".$_GET['do'].".php";
             }else{
            $file="./back/topic_list.php";
            } */

        //$do=(isset($_GET['do']))?$_GET['do']:'topic_list';
        $do = $_GET['do'] ?? 'topic_list'; //是否有do這個參數在?
        $file = "./back/" . $do . ".php";
        if (file_exists($file)) { //如果檔案存在的話
            include $file; //直接載入
        } else {
            include "./back/topic_list.php"; //不存在的話，就顯示這個網址
        }
        //include (file_exists($file))?$file:"./back/topic_list.php";


        ?>
    </main>

    <footer>

    </footer>

</body>

</html>