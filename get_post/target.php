<h1>目標頁面</h1>
<?php

// if(!empty($_GET)){ //如果GET陣列裡面不是空的
//     echo "以下資料為GET表單的資料<br>";
//     echo "<pre>";
//     print_r($_GET);
//     echo "</pre>";
// }

if(!empty($_GET)){ //如果GET陣列裡面不是空的
    echo "以下資料為GET表單的資料<br>";
    $age=$_GET['age'];
    echo "你的年齡為：". $age. "<br>";
    if($age>=45){
        echo "屬於中高齡";
    }else if($age>=30){
        echo "屬於中年人";
    }else if($age>=25){
        echo "屬於青年";
    }else{
        echo "屬於少年";
    }
}


if(!empty($_POST)){
    echo "以下資料為POST表單的資料";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
}