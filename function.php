<?php
//傳值呼叫 call by value
function change($n1,$n2){
    $tmp=$n1;
    $n1=$n2;
    $n2=$tmp;
    echo '$n1的值為' . $n1 .'<br>';
    echo '$n2的值為' . $n2.'<br>';
}
$num1=100;
$num2=1;
change($num1,$num2);

echo '$num1的值為' . $num1 .'<br>';
echo '$num2的值為' . $num2 .'<br>';

echo"<hr>";

//傳址呼叫 call by reference
function change2($n1,$n2){
    $tmp=$n1;
    $n1=$n2;
    $n2=$tmp;
    echo '$n1的值為' . $n1 .'<br>';
    echo '$n2的值為' . $n2.'<br>';
}
$num1=100;
$num2=1;
change2($num1,$num2);

echo '$num1的值為' . $num1 .'<br>';
echo '$num2的值為' . $num2 .'<br>';

echo"<hr>";
//設定參數的預設值
function drink($a='茶'){
    echo "請給我一杯$a";
}
drink();
echo "<br>";
drink($a='果汁');

echo"<hr>";
//變動長度參數
function tour(...$cities){
    foreach($cities as $city){
        echo "$city";
    }
}
tour('台北 ','台中 ','高雄 ','花蓮 ');
echo "<br>";

function trapezoidArea($top,$bottom,$height){
    $area = ($top + $bottom)* $height / 2;
    echo "梯形面積為：" . $area;
}
trapezoidArea(6,10,10);
echo "<br>";

//靜態變數：區域變數在函式執行完不會被保留
function add(){
    $result=0;
    $result++;
    echo $result;
}
add();
echo "<br>";
add();
echo"<hr>";

//要保留函式內區域變數的值可用static
function add2(){
    static $result=0;
    $result++;
    echo $result;
}
add2();
echo "<br>";
add2();
echo "<br>";
add2();

echo"<hr>";
//可變動函式
function circle($r){
echo "半徑".$r."的圓面積：".$r*$r*3.14;
}
circle(10);
echo "<br>";


//匿名函式
$greet=function($name){
    echo "hello " . $name;
}; //後面記得要加上分號!

$greet('world!');
echo "<br>";
$greet('Mary');

echo"<hr>";
//閉包 Closuer類別/ use外層變數
$a=1;
$b=2;
$myClosure=function($c)use($a,$b){
    return $a+$b+$c;
};//後面記得要加上分號!
echo $myClosure(3);
echo "<br>";


//箭頭函式
$sum=fn($c)=>$a+$b+$c;
echo $sum(3);
echo "<br>";

$sum2=fn($d,$e)=>$d*$e;
echo $sum2(10,20);
?>