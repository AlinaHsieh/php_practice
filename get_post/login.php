<?php
if(isset($_GET['error'])){
    echo "<span style=color:red>";
    echo $_GET['error'];
    echo "</span>";
}

?>
<h1>登入頁面</h1>
<form action="check.php" method="post">
    <div>
    <label for="">帳號</label>
    <input type="text" name="account" id="accout">
    </div>
    <div>
    <label for="">密碼</label>
    <input type="text" name="password" id="password">
    </div>
    <div>
    <input type="submit" value="登入">
    </div>
</form>