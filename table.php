<?php
//function call php(){
    session_start();

    $token = bin2hex(random_bytes(32));
    $_SESSION['token'] = $token;
    echo $_SESSION['token'];

    if (isset($_SESSION['user_id'])) {
    //if( isset($_POST["token"]) && ($_POST["token"] === $_SESSION['token'])) {
            echo "<form action=\"comment.php\" method=\"post\">";
            echo "<input type=\"hidden\" name=\"token\" value=".$token.">";
            echo "コメント: <input type=\"text\" name=\"comment\" /><br/>";
            echo "<input type=\"submit\" />";
            echo "</form><br/>";
    }

    // 接続
    $mysqli = new mysqli('localhost', 'takaoka', 'Ryoga0719', 'test');

    //接続状況の確認
    if($mysqli->connect_error){
            echo $mysqli->connect_error;
            exit();
    }

    $sql = "SELECT * FROM `trx_comments` AS `comments` JOIN `trx_users` AS `users` ON `users`.`id` = `comments`.`user_id`";
    $result = $mysqli->query($sql);

    echo "<table>\n";
    echo "<tr><th>ID</th><th>ユーザ名</th><th>コメント</th></tr>\n";
    while($row = $result->fetch_assoc() ){
            echo "<tr>\n";
            echo "<td>{$row['id']}</td>\n";
            echo "<td>{$row['user_name']}</td>\n";
            echo "<td>{$row['text']}</td>\n";
            echo "</tr>\n";
    }
    echo "</table>";
//}
?>
