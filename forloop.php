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