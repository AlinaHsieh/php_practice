<h1>cookie</h1>
<?php
date_default_timezone_set("Asia/Taipei");
// echo date("Y-m-d H:i:s");

//設定cookie
setcookie('name','Alina',strtotime("2023-05-22 22:27:00")); //設定cookie的過期時間是
echo $_COOKIE['name']; //記得大寫;第一次瀏覽器請求伺服器setcookie時，回傳的值沒有name>重新整理第二次才會抓得到name的value



?>
