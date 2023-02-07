<section>
    <form action="" method="post">
        名前:<br>
        <input type="text" name="name" value=""><br>
        <br>
        パスワード:<br>
        <input type="text" name="password" value=""><br>
        <input type="submit" value="登録">
    </form>
</section>

<?php
    // 接続
    $mysqli = new mysqli('localhost', 'takaoka', 'Ryoga0719', 'test');
    //$pdo = new PDO('mysql:host=localhost;dbname=test', takaoka, Ryoga0719);

    //接続状況の確認
    if($mysqli->connect_error){
        echo $mysqli->connect_error;
        exit();
    }else{
        $mysqli->set_charset('utf8');
    }

    //$num = htmlentities($_POST["num"], ENT_QUOTES);
    $name = htmlentities($_POST["name"], ENT_QUOTES);
    $pass = htmlentities($_POST["password"], ENT_QUOTES);

    $sql = "INSERT INTO user (name, password) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ss', $name, $pass);
    $stmt->execute();
    //$sql = "INSERT INTO user VALUES (". strval($num) .",'".$name."','".$pass."')";
    //$mysqli->query($sql);

    /*$sqlSel = "SELECT * FROM user";
    $result = $mysqli->query($sqlSel);

    while($row = $result->fetch_assoc() ){
        echo $row['id'] . " " .$row['name'] . "<br/>";
    }*/

    // 切断
    $stmt->close();
    $mysqli->close();
?>
