<?php
echo $_POST["message"];
//echo htmlentities($_POST["message"], ENT_QUOTES);

?>

<!DOCTYPE html>
<html>
  <head>
    <script type="text/javascript">
       document.cookie = "ダメー！";
    </script>
    <meta charset="utf-8">
  </head>

  <body>
    <form action="form.php" method="post">
        メッセージ: <input type="text" name="message" /><br/>
        <input type="submit" />
    </form>
  </body>
</html>
