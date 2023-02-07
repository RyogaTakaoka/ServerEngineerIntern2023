<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>今何時？</title>
</head>
<body>
<?php date_default_timezone_set ('Asia/Tokyo'); ?>
<h1>
  <?php
    $time = date('Y年m月d日 H:i:s')."<br/>\n";
    echo "アクセスした時刻：", $time;
  ?>
</h1>

</body>
</html>
