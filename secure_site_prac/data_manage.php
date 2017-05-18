<html>
    <head>
        <meta charset="utf-8">
        <title>商品編集</title>
    </head>
    <body>
        <p>商品編集</p>
<?php
    session_start();
    header("Content-Type: text/html; charset=utf-8");
    $name     = $_SESSION["name"];
    $data     = $_GET["data"];
    $value    = $_GET["value"];
    $user     = 'root';
    $password = 'root';
    $db       = 'sotuen';
    $host     = 'localhost';
    $port     = 3306;

    try{
        $pdo       = new PDO("mysql:host=".$host.";dbname=".$db.";charset=utf8mb4", $user, $password);
        $query     = "select data, value from user_data where user_name= ? and data = ? and value = ?;";
        $statement = $pdo->prepare($query);
        $statement->execute( array($name, htmlspecialchars($data, ENT_NOQUOTES, "utf-8"), htmlspecialchars($value, ENT_NOQUOTES, "utf-8")) );
        if( $result = $statement->fetch(PDO::FETCH_ASSOC) ){
            ?>
            <?php echo htmlspecialchars($result["data"], ENT_NOQUOTES, "utf-8"); ?>
            <form action="update_data.php" method="POST">
                新しい名前:<input type="text"  name="data"></br>
                新しい価格:<input type="value" name="value"></br>
                <input type="hidden" name="token"     value="<?php echo htmlspecialchars(session_id(), ENT_NOQUOTES, 'utf-8'); ?>">
                <input type="hidden" name="old_data"  value="<?php echo htmlspecialchars($data,        ENT_NOQUOTES, 'utf-8'); ?>">
                <input type="hidden" name="old_value" value="<?php echo htmlspecialchars($value,       ENT_NOQUOTES, 'utf-8'); ?>">
                <input type="submit" value="更新">
            </form>
  <?php } else {
            echo "商品がみつかりません";
        }
        $pdo = null;
    }catch(PDOExeption $e){
        //echo $e->getMessage()."</br>";
        echo "データベースエラー";
    }
?>
    </body>
</html>