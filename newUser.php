<?php
    // 接続
    $mysqli = new mysqli('localhost', 'takaoka', 'Ryoga0719', 'test');

    //接続状況の確認
    if($mysqli->connect_error){
        echo $mysqli->connect_error;
        exit();
    }else{
        $mysqli->set_charset('utf8');
    }
    $name = htmlentities($_POST["username"], ENT_QUOTES);
    $password = htmlentities($_POST["password"], ENT_QUOTES);
    $password_hash = hash("sha256", $password);

    $sql = "INSERT INTO trx_users (user_name, password) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ss', $name, $password_hash);
    $stmt->execute();

    // 切断
    $stmt->close();
    $mysqli->close();
?>

<!DOCTYPE html>
<html>
<h2>ユーザ追加</h2>
<meta charset="utf-8">
<form action="newUser.php" method="post">
  ユーザ: <input type="text" name="username" /><br/>
  パスワード: <input type="password" name="password" /><br/>
  <input type="submit" />
</form>
