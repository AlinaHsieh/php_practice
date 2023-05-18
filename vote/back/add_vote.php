<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增主題</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <main>

        <h1>新增主題</h1>
        <form action="../api/add_vote.php" method="post">
            <div>
                <label for="subject">主題說明：</label>
                <input type="text" name="subject" id="subject" class="subject-input">
            </div>
            <div class="time-set">
                <div class="time-item">
                    <label for="open_time">開放時間：</label>
                    <input type="datetime-local" name="open_time" id="open_time">
                </div>
                <div class="time-item">
                    <label for="close_time">關閉時間：</label>
                    <input type="datetime-local" name="close_time" id="close_time">
                </div>
            </div>
            <div>
                <label for="type">單複選：</label>
                <input type="radio" name="type" value="1">單選&nbsp;&nbsp;
                <input type="radio" name="type" value="2">複選
            </div>
            <hr>
            <div class="options">
                <div>
                    <label for="description">項目：</label>
                    <input type="text" name="description[]" class="description-input">
                    <span>+</span>
                </div>
                <!-- 早期做法 -->
                <div>
                    <label for="description">項目：</label>
                    <!-- 為了避免name設成一樣的會被覆蓋掉，所以用陣列的方式，才會儲存所有的項目內容，然後以是否印出空的陣列（空字串）判斷是否寫入資料庫 -->
                    <input type="text" name="description[]" class="description-input">
                </div>
                <div>
                    <label for="description">項目：</label>
                    <input type="text" name="description[]" class="description-input">
                </div>
                <div>
                    <label for="description">項目：</label>
                    <input type="text" name="description[]" class="description-input">
                </div>
                <div>
                    <label for="description">項目：</label>
                    <input type="text" name="description[]" class="description-input">
                </div>
                <div>
                    <label for="description">項目：</label>
                    <input type="text" name="description[]" class="description-input">
                </div>
                <div>
                    <label for="description">項目：</label>
                    <input type="text" name="description[]" class="description-input">
                </div>
            </div>
            <div>
                <input type="submit" value="新增">
            </div>
        </form>
    </main>
</body>

</html>