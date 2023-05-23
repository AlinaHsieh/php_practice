<!-- <h1>未加入session的登入</h1> -->
<?php
/*
$acc = 'admin';
$pw = '1234';
if ($_POST['acc'] == $acc && $_POST['pw'] == $pw) {
    echo "登入成功";
} else {
    echo "帳號或密碼錯誤";
} //即使登入成功，但沒有留在登入成功的狀態 
*/
?>

<h1>加入session的登入</h1>
<?php
session_start();
$acc = 'admin'; //form表單的 name='acc'
$pw = '1234'; //form表單的 name='pw'

if ($_POST['acc'] == $acc && $_POST['pw'] == $pw) {
    // echo "登入成功";
    $_SESSION['login'] = $acc;//加上$_SESSION,登入成功後留在登入成功的狀態(xampp的tmp資料夾中有資料)
    if(isset($_SESSION['error'])){ //如果之前有登入錯誤，伺服器端換留存登入錯誤的$_SESSION，要把它刪掉。
        unset($_SESSION['error']);
    }
    header("location:member_center.php");
} else {
    // echo "帳號或密碼錯誤";
    $_SESSION['error'] = "帳號或密碼錯誤";
    if(isset($_SESSION['login'])){ //確保沒有之前登入成功的$_SESSION，如果有要把它刪掉。
        unset($_SESSION['login']);
    }
    header("location:login.php");

} 
?>