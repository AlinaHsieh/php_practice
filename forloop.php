<!-- CSS -->
<style>
div{
    display: flex;
    justify-content: center;
    border:1px solid black;
    padding:10px;
    /* margin: auto; */
    width:615px;
    text-align: center;
}
table{
    width:600px;
    border:1px solid black;
    border-collapse: collapse;
    
}
td{
    padding:6px;
}
table{
    padding: 10px;
}
.td2{
    border:1px solid black;
    text-align: center;
}
.td3{
    border:1px solid black;
    background-color: lightslategray;
}
.tr3{
    background-color: lightslategray;
    border:1px solid black;
    
}
</style>

<!-- PHP -->
<?php
echo "<h1>求1~100的質數</h1>";

$n=100;  //設定範圍最大值

for($i=2;$i<=$n;$i++){ //設定除數最小值2
    $result=true; //設定一個用來儲存質數的東西=>當$result被指定為true時是質數 
    for($j=2;$j<$i;$j++){ //設定被除數
        if($i%$j==0){  //餘數為0時
            $result=false; //除數與被除數可以整除的情況下則不是質數
            break; //除數只要除到一個被除數是可以被整除的，表示該數不是質數，就不用再跑完後面的整圈被除數了。
        }
    }
    if($result==true){
        echo $i . ",";
    }
}
echo "<h1>求1~50的質數</h1>";
echo "<hr>";
$x=50;
for($y=2;$y<=$x;$y++){
    $num=true;
    for($z=2;$z<$y;$z++){
        if($y%$z==0){
            $num=false;
            break;
        }
    }
    if($num==true){
        echo $y . "|";
    }
}
echo "<h1>九九乘法表</h1>";
echo "<div>";
echo "<table>";
for($i=1;$i<=9;$i++){
    echo "<tr>";
    for($j=1;$j<=9;$j++){
        echo "<td>";
        echo $i ."X". $j . "=" . $i*$j . "&nbsp;";
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";
echo "</div>";
echo "<br>";
echo "<h1>九九乘法表進階版</h1>";
echo "<table class=t2>";
echo "<tr class=tr2>";
for($i=0;$i<=9;$i++){
    if($i==0){
        echo "<tr class= 'tr3'>";
    }
    
    for($j=0;$j<=9;$j++){
        if($j==0){
            echo "<td class='td3'>";
        }else{
            echo "<td class='td2'>";
        }
        if($i==0 && $j==0){
            echo "&nbsp;";
        }elseif($i==0){
            echo $j;
        }elseif($j==0){
            echo $i;
        }elseif($i!=0 && $j!=0){
            echo $i*$j;    
        }
        echo "</td>";
    }
echo "</tr>";
}
echo "</table>";
echo "<br>";
// 計算2到100之間所有偶數的總和
$sum=0;
for($i=2;$i<=100;$i+=2){
$sum=$sum+$i;
}
echo "2到100之間所有偶數的總和為：" . $sum;
echo "<br>";
// 計算1~10的階乘
$n=1;
for($i=1;$i<=10;$i++){
    $n=$n*$i;
}
echo "1~10的階乘為：" . $n;
echo "<br>";
echo "計算60遞減加到20：";
$result=0;
for($i=60;$i>=20;$i--){
$result+=$i;
}
echo $result;
echo "<br>";
echo"計算階層函數n!值大於100的最小n值和n!";
$result=1;
$n=1;
while($result<=100){
$result=$result*$n;
$n=$n+1;
}$n=$n-1;
echo "<br>";

echo "平年閏年練習<br>";
$year=2024;
if($year/4!=0){
    if($year/100==0 && $year/400!=0){
    }
    echo "平年";
}elseif($year/4==0 && $year/100!=0){
    echo "閏年";
}