<?php
echo "<h1>陣列練習1</h1>";
$score=[85,60,54,91,100,77];
$maxScore = 0;
$minScore = 100;
foreach($score as $value)
    if($value>$maxScore)
    $maxScore= $value;
    echo "最高分為$maxScore<br>";

foreach($score as $value)
    if($value<$minScore)   
    $minScore = $value;
    echo "最低分為$minScore";

echo "<hr>";
echo "<h1>陣列練習2</h1>";
$grades=array(78,55,69,93);
$names[]='江小魚';
$names[]='陳允傑';
$names[]='楊過';
// print_r($grades);
echo "<br>";
$grades[2]=65;//更改key為2的值
$total=0;
for($i=0;$i<count($grades);$i++){
    echo "$i=>$grades[$i]&nbsp;";
    $total += $grades[$i];
}
echo "<br>成績總分：". $total . "分<br>";
for($i=0;$i<count($names);$i++)
    echo "$i=>$names[$i]<br>";
$names[]='陳會安';
for($i=0;$i<count($names);$i++)
    echo "$i=>$names[$i]";

echo "<hr>";
echo "<h1>陣列練習3</h1>";
$score=[22,16,30,24];
$total=0;
foreach($score as $element){
    echo "$element";
    echo "<br>";
    $total += $element;
}
echo "<br>";
echo "得分總合：$total" . "<br>";
print_r($score);
