<?php

//在自己的登入頁面進行檢查的例子
$account='123';
$password='456';
if(!empty($_POST)){ //要先判斷$_POST裡面有輸入資料，避免還沒輸入的時候就出現錯誤訊息
    if($_POST['account']===$account && $_POST['password']===$password){
        echo "登入成功！";
    }else{
        echo "帳號或密碼錯誤";
    }
}
?>
<h1>登入頁面</h1>
<form action="?" method="post">
    <div>
        <label for="">帳號</label>
        <input type="text" name="account" id="account">
    </div>
    <div>
        <label for="">密碼</label>
        <input type="password" name="password" id="password">
    </div>
    <div>
        <input type="submit" value="登入">
    </div>
</form>