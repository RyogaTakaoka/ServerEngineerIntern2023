<?php
/**
 * コメント投稿したときに呼ばれる想定
 */
session_start();

if(!isset($_POST["token"]) || ( $_POST["token"] !== $_SESSION['token'] )) {
  //ログインしていないときは処理されたくない
  echo "Bad Request";
  exit();
}

// 接続
$mysqli = new mysqli('localhost', 'takaoka', 'Ryoga0719', 'test');

//接続状況の確認
if($mysqli->connect_error){
  echo $mysqli->connect_error;
  exit();
}else{
  $mysqli->set_charset('utf8');
}

$comment = htmlentities($_POST["comment"], ENT_QUOTES);

$sql = "INSERT INTO trx_comments (user_id, text) VALUES (?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('is', $_SESSION['user_id'], $comment);
$stmt->execute();

// 切断
$stmt->close();
$mysqli->close();

header('Location:http://localhost:8080/table.php');
