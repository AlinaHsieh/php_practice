<?php include_once "../db.php";
$topic = $pdo->query("select * from `topics` where `id` ='{$_GET['id']}' ")
    ->fetch(PDO::FETCH_ASSOC);
$options = $pdo->query("select * from `options` where `subject_id` = '{$_GET['id']}'")
    ->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯主題</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.7.0.min.js"></script>
</head>

<body>
    <main>

        <h1>編輯主題</h1>
        <form action="../api/edit_vote.php" method="post">
            <div>
                <label for="subject">主題說明：</label>
                <input type="text" name="subject" id="subject" class="subject-input" value="<?= $topic['subject'] ?>">
            </div>
            <div class="time-set">
                <div class="time-item">
                    <label for="open_time">開放時間：</label>
                    <input type="datetime-local" name="open_time" id="open_time" value="<?= $topic['open_time'] ?>">
                </div>
                <div class="time-item">
                    <label for="close_time">關閉時間：</label>
                    <input type="datetime-local" name="close_time" id="close_time" value="<?= $topic['close_time'] ?>">
                </div>
            </div>
            <div>
                <label for="type">單複選：</label>
                <!-- 要顯示單選/複選的項目，首先要給值，再帶入三元運算式，使用checked做勾選顯示。>入果是1>顯示單選，如果是2，顯示複選;如果是多個選項，則用switch或多個if else. -->
                <input type="radio" name="type" value="1" <?= ($topic['type'] == 1) ? 'checked' : ''; ?>>單選&nbsp;&nbsp;
                <input type="radio" name="type" value="2" <?= ($topic['type'] == 2) ? 'checked' : ''; ?>>複選

            </div>
            <hr>
            <div class="options">
                <!-- 早期做法 -->
                <!-- 為了避免name設成一樣的會被覆蓋掉，所以用陣列的方式，才會儲存所有的項目內容，然後以是否印出空的陣列（空字串）判斷是否寫入資料庫 -->
                <?php
                foreach ($options as $opt) { //把$options(從資料庫抓到的subject_id陣列資料)，利用迴圈顯示出每一筆選項($opt)，input要設value才可以抓值。
                ?>
                    <div>
                        <label for="description">項目：</label>
                        <!-- 下面這行只是選項的描述 -->
                        <input type="text" name="description[]" class="description-input" value="<?= $opt['description'] ?>">
                        <span onclick="addOption()">+</span>
                        <span onclick="removeOption(this)">-</span>
                        <!-- 表單如果有多筆，會以陣列方式傳回>選項是多筆，所以為陣列(選項id跟description都是相對應陣列) -->
                        <input type="hidden" name="$opt_id[]" value="<?= $opt['id']; ?>">
                        <!-- 選項的id > 後台同時有description陣列跟選項的陣列回傳，並作比對 -->
                    </div>
                <?php
                }
                ?>
            </div>
            <div>
                <!-- 設隱藏欄位，才能抓到要編輯的主題是什麼(topic_id) -->
                <input type="hidden" name="subject_id" value="<?= $topic['id']; ?>">
                <input type="submit" value="編輯">
            </div>
        </form>
    </main>
    <script>
        function addOption() {
            // 這裡使用上引號，斷行才不會出錯
            let opt = `<div>
                <label for="description">項目：</label>
                <input type="text" name="description[]"  class="description-input">
                <span onclick="addOption()">+</span>
                <span onclick="removeOption(this)">-</span>
            </div>`
            //$>宣告jquery,("")>選擇物件
            $(".options").append(opt);
        }

        function removeOption(el) {
            let dom = $(el).parent()
            $(dom).remove();
        }
    </script>
</body>

</html>