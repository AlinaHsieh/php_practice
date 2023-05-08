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
///////////////////////////////////////////
echo "<hr>";
echo "給定兩個日期，計算中間間隔天數" . "<br>";
date_default_timezone_set("Asia/Taipei");
echo "2023-04-24". "<br>";
echo "2023-10-02". "<br>";
$start=strtotime("2023-04-24");
$end=strtotime("2023-10-02");
$gap=($end-$start)/(60*60*24);
echo "距離天數：". $gap . " 天" . "<br>";
$birthday=strtotime("2023-10-02");
$now=strtotime(date("Y-m-d"));
$days=($birthday-$now)/(60*60*24);
echo "距離我生日還有" .$days . " 天" . "<br>";
echo "<hr>";
?>

<h2>利用date()函式的格式化參數，完成以下的日期格式呈現</h2>
<ul>
    <li>2023/04/24</li>
    <li>4月24日 Monday</li>
    <li>2023-4-24 14:9:5</li>
    <li>2023-04-24 14:09:05</li>
    <li>今天是西元2023年4月24日 上班日(或假日)</li>
</ul>
<?php
echo date("Y/m/d") . "<br>";
echo date("n月j日 l"). "<br>";
echo date("Y-n-j G:") . (int)date("i").":".(int)date("s")."<br>";
echo date("Y-m-d H:i:s"). "<br>";
echo "今天是西元 ". date("Y年n月j日");
echo date("N")>=6?" (假日)":" (上班日)";
////////////////////////////////////
echo "<hr>";
echo "<h2>刻出一個月的月曆</h2> ";

$today=strtotime("now");    //取得當前的時間秒數
$month=date("n",$today);    //取得當前的月份
$days=date("t",$today);     //取得當前月份的總天數
$firstDate=date("Y-n-1",$today);    //取得當前月份第一天
$finalDate=date("Y-n-t",$today);    //取得當前月份最後一天
$firstDateWeek=date("w",strtotime($firstDate)); //取得當前月份第一天的星期
$finalDateWeek=date("w",strtotime($finalDate)); //取得當前月份最後一天的星期
$weeks=ceil(($days+$firstDateWeek)/7);  //計算當前月份的天數會佔幾周
$firstWeekSpace=$firstDateWeek-1;       //計算當前月份第一周的空白日(或前一個月份佔幾天)
echo "月:".$month;
echo "<br>";
echo "天數:".$days;
echo "<br>";
echo "第1天:".$firstDate;
echo "<br>";
echo "最後1天:".$finalDate;
echo "<br>";
echo "第1天星期:".$firstDateWeek;
echo "<br>";
echo "最後1天星期:".$finalDateWeek;
echo "<br>";
echo "周數:".$weeks;
echo "<br>";
//先畫出固定的表頭內容
echo "<table>";
echo "<tr>";
echo "<td>日</td>";
echo "<td>一</td>";
echo "<td>二</td>";
echo "<td>三</td>";
echo "<td>四</td>";
echo "<td>五</td>";
echo "<td>六</td>";
echo "</tr>";
//使用迴圈來畫出當前月的周數
for($i=0;$i<$weeks;$i++){
    echo "<tr>";

    //使用迴圈來畫出當周的天數
    for($j=0;$j<7;$j++){
        echo "<td>";
        //判斷當周是否為第一周或最後一周
        if(($i==0 && $j<$firstDateWeek) || (($i==$weeks-1) && $j>$finalDateWeek)){
            echo '&nbsp';
        }else{
            echo $j+7*$i-$firstWeekSpace;
        }
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";


