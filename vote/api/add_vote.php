<?php
include_once "../db.php";

/* echo "<pre>";
print_r($_POST);
echo "</pre>"; */

//思考：如果要新增項目(在還沒回傳資料庫以前)，如何去抓id產生關聯(原有的id是在寫入資料庫後才會產生的)?所以需要在寫入資料庫之前產生一個唯一的值(第二個id) 
//如何確保主題不會重複(是唯一的)?早期做法：先用下面的句子去資料庫撈一次，確保主題不重複時，才把主題寫進去
$sql_chk_subject="select count(*) from `topics` where subject='{$_POST['subject']}'";
$chk=$pdo->query($sql_chk_subject)->fetchColumn();
if($chk>0){  //表示這個主題被用過了
    echo "此主題已被使用過,請修改主題內容";
    echo "<a href='../back/add_vote.php'>返回新增主題</a>";
}else{ //沒被用過，就可以被寫進資料庫了
    $sql="INSERT INTO `topics`(`subject`, `open_time`, `close_time`, `type`) 
        VALUES ('{$_POST['subject']}','{$_POST['open_time']}','{$_POST['close_time']}','{$_POST['type']}')";
    $pdo->exec($sql);
    //寫入選項，先把剛才判斷沒重複的主題id撈出來再寫入！記得要把寫入的步驟包在else裡面。
    $sql_subject_id="select `id` from `topics` where `subject`='{$_POST['subject']}'";
    //echo $sql_subject_id;
    $subject_id=$pdo->query($sql_subject_id)->fetchColumn(); //拿到subject id
    
    //echo $subject_id;

    foreach($_POST['description'] as $desc){ //把description陣列拆成一筆一筆的，寫到資料庫裡面去
        if($desc!=''){ //每一個description項目去檢查，必須不是空值，才把它寫入，如果是空的，就換下一圈繼續檢查。
            $sql_option="INSERT INTO `options`(`description`,`subject_id`)
                       VALUES ('$desc','$subject_id')";   //`total`預設值是0,這邊可以先不需要不寫入，還要寫入主題的id
            $pdo->exec($sql_option); //執行$sql語法，寫入資料庫。
        }
    }
}
header("location:../backend.php");