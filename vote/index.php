<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投票系統</title>
</head>

<body>
    <header>
        <a href="./index.php">首頁</a>
        <a href="./front/result.php">結果</a>
        <a href="./front/login.php">登入</a>
        <a href="./front/reg.php">註冊</a>
    </header>
    <main>
        <ul>
            <?php
            //資料庫連線(連到db.php檔案)
            include_once "db.php";
            
            $sql = "select * from `topics`";
            $rows = $pdo->query($sql)->fetchAll();
            foreach ($rows as $row) {
            ?>
                <!-- 穿插html，顯示投票主題 -->
                <li><?= $row['subject'];?></li>
            <?php
            };
            ?>
        </ul>
    </main>
</body>

</html>