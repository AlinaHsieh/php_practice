<?php include_once "../db.php";
$row=$pdo->query("select * from `topics` where `id`= '{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);
?>
<h3>確定刪除投票主題及相關資訊？</h3>
<div><?=$row['subject']?></div>
<!-- 記得帶值才知道要刪哪個東西 -->
<button onclick="location.href='../api/del_vote.php?id=<?=$_GET['id']?>'">確定刪除</button>
<button onclick="location.href='../backend.php'">取消</button>
