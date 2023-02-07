<?php
//function callphp() {
    session_start();

    //echo 'test';

    //MySQLに接続
    $mysqli = new mysqli('localhost', 'takaoka', 'Ryoga0719', 'test');

    if($mysqli->connect_error){
        echo $mysqli->connect_error;
        exit();
    }

    $name = htmlentities($_POST["username"], ENT_QUOTES);
    $password = htmlentities($_POST["password"], ENT_QUOTES);
    $password_hash = hash("sha256", $password);

    $sql = "SELECT * FROM `trx_users`";
    $result = $mysqli->query($sql);
    while($row = $result->fetch_assoc() ){
	    $alert = "<script type='text/javascript'>alert('". $alert_word. "');</script>";
	    if($name === $row['user_name'] and $password_hash === $row['password']){
		    $_SESSION['user_id'] = $row['id'];
		    $_SESSION['user_name'] = $row['user_name'];
	    }else{
		    $alert_word = "ユーザ名が存在しません";
	    }
        /*else if($password !== $row['password']){
            $alert_word = "パスワードが違います";
            echo $alert;
        }*/       
    }
    if(isset($_SESSION['user_id'])) {
        echo "既にログインしています<br>";
        echo "username:".$_SESSION['user_name'];
	    /*$_GET['query'] = 'table';
        require_once($_GET['query'].'.php');↲
        callphp();*/
        header('Location:http://localhost:8080/table');
        exit();
    }
    $mysqli->close();
//}
?>

<!DOCTYPE html>
<html>
<h2>ログイン</h2>
<meta charset="utf-8">
<form action="login.php" method="post">
ユーザ: <input type="text" name="username" /><br/>
パスワード: <input type="password" name="password" /><br/>
<input type="submit" />
</form>
