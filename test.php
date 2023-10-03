<?php
$string1 = "It's aa pencil";
$string2 = "a pen";

$len1 = strlen($string1);
$len2 = strlen($string2);

$position = false;

for($i=0; $i <= $len1-$len2 ; $i++){
    $match = true;

    for($j=0; $j<$len2; $j++){
        if($string1[$i +$j] != $string2[$j]){
            $match = false;
            break;
        }
    }

    if($match){
        $position = $i;
        break;
    }

}

if($position !== false){
    echo "字串2在字串1中的位置：$position";
}else{
    echo "字串2沒有在字串1中找到";
}

?>