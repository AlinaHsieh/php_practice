<?php 
include_once "../db.php";
$sql="update `topics`
        set  `subject`='{$_POST['subject']}',
             `open_time`='{$_POST['open_time']}',
             `close_time`='{$_POST['close_time']}',
             `type`='{$_POST['type']}'
        where `id`='{$_POST['subject_id']}'";
$pdo->exec($sql);

//先從資料庫將該主題的所有選項資料撈出
$options=$pdo->query("select `id` from `options` where `subject_id`='{$_POST['subject_id']}'")
             ->fetchAll(PDO::FETCH_ASSOC);

//先判斷資料庫撈出的選項資料表，跟從form表單傳來的選項資料是否一致(比對id)，然候依序執行"1.刪除">"2.更新">"3.新增"
// 1.刪除
if(!empty($options)){ //如果$options(資料表)不是空的
    if(isset($_POST['opt_id'])){ //而且如果表單的id選項陣列存在>(選項的資料有可能是一樣的，也有可能是不同的)不同就要刪除
        foreach($options as $opt){ //用迴圈方式針對陣列一筆一筆的選項做檢查
            if(!in_array($opt['id'],$_POST['opt_id'])){ //$opt_id(表單id)項目是否在$opt(資料表)中 > 有：不動 ; 沒有：刪除
                $pdo->exec("delete from `options` where `id`='{$opt['id']}'"); //刪掉資料表裡面的資料
            }
        }
    }else{
        $pdo->exec("delete from `options` where `subject_id`='{$_POST['subject_id']}'");//如果表單選項id沒有傳來(空的)>把項目“全部”刪掉
    }
}//如果$options是空的(只有主題)不用動他，之後新增就好。



// 2.更新資料表中已有的選項內容
if(isset($_POST['opt_id'])){//如果表單傳來的選項這個陣列存在
    foreach($_POST['opt_id'] as $idx => $id){ //看表單中存在的資料>有多少更新多少筆($idx對$id)
       $pdo->exec("update `options` set `description`='{$_POST['description'][$idx]}' where `id`='$id'"); //要指名是description陣列中的$idx
       unset($_POST['description'][$idx]);
    }
}

// 3.新增資料表中已有的選項內容
if(!empty($_POST['description'])){
    foreach($_POST['description'] as $desc){
        $pdo->exec("insert into `options` (`description`,`subject_id`) values('$desc','{$_POST['subject_id']}')");
    }
}






// echo "<pre>";
// print_r($options);
// echo "<pre>";
// echo "<pre>";
// print_r($_POST['description']);
// echo "<pre>";
// echo "<pre>";
// print_r($_POST['opt_id']);
// echo "<pre>";