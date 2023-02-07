<?php
function callphp() {
    //これないと閉じ込められる
    session_start();
    if(isset($_SESSION['user_id'])) {
    //if( isset($_POST["token"]) && ($_POST["token"] === $_SESSION['token'])) {
        $_POST = array();
        $_SESSION = array();
        session_destroy();
        //header("Location:http://localhost:8080/login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<h2>ログアウト</h2>
<meta charset="utf-8">
<form action="logout.php" method="post">
  <button type="submit" name="logout">ログアウト</button>
</form>
