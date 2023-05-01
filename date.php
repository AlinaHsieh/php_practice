<?php
//日期與時間基本介紹
date_default_timezone_set("Asia/Taipei");
echo strtotime("now"); //顯示現在的秒數（還未換算成小時分鐘)
echo "<br>";
$yesterday=strtotime("now") - (60*60*24); //昨天的秒數＝扣掉一天的秒數
echo $yesterday;
echo "<br>";
echo date("Y-m-d");
echo "<br>";
echo date("Y-m-d H:i:s");
$today=strtotime("now");
echo"<br>";
echo "現在的時間(總秒數)為：".$today . " 秒". "<br>";
echo "可讀的日期字串：". date("Y-m-d H:i:s",$today). "<br>";
echo "昨天是：" . date("Y-m-d",$yesterday) . "<br>";
// $tomorrow=strtotime("now") + (60*60*24);
$tomorrow=strtotime("+1 days");
echo "明天是：" . date("Y-m-d",$tomorrow). "<br>"; 
// $nextweek=strtotime("+1 weeks",$today);
$nextweek=strtotime("next week");
echo "下週是：" . date("Y-m-d", $nextweek). "<br>";
// $lastweek=strtotime("-1 weeks",$today) ;
$lastweek=strtotime("last week");
echo "上週是：". date("Y-m-d", $lastweek);


