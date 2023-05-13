<?php
$account='1111';
$password='2222';
if(!empty($_POST)){
    if($_POST['account']===$account && $_POST['password']===$password){ 
        echo "登入成功";
    }else{
        // echo "登入失敗";
        // header('location:login.php'); //登入失敗時導回登入頁面，因為已經導過去了，所以看不到登入失敗訊息，應寫成下面：
        header('location:login.php?error=帳密錯誤，重新登入');
    }
}?>
<br><a href="login.php">回登入頁</a>
