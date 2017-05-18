<head>
    <meta charset="utf-8">
    <title>マイページ</title>
</head>
<body>
<?php
    //ini_set( 'display_errors', 1 ); 
    session_start();
    session_id($_COOKIE["PHPSESSID"]);
    header("Content-Type: text/html; charset=utf-8");
    $name = $_SESSION["name"];   
    if(!$name){
?>
        <p>ログインしてください</p>
        <a href="login_form.html">ログイン</a>
<?php
    } else {
?>
こんにちは <?php echo htmlspecialchars($name, ENT_NOQUOTES, "UTF-8"); ?> さん
<?php } ?>
    </br>
    <form action="user_data.php" method="GET">
        検索：<input type="text" name="search">
        <input type="submit" value="検索">
    </form>
    
</body>
<?php
    header("Content-Type: text/html; charset=utf-8");
    $search   = $_GET["search"];
    $user     = 'root';
    $password = 'root';
    $db       = 'sotuen';
    $host     = 'localhost';
    $port     = 3306;

    try{
        $pdo  = new PDO("mysql:host=".$host.";dbname=".$db.";charset=utf8mb4", $user, $password);
        $query = "select data, value from user_data where user_name= ? ";
        if($search){
            $query = $query." and data= ? ";
        }
        $query = $query. ";";
        $statement = $pdo->prepare($query);
        $search ? $statement->execute(array($name, $search)) : $statement->execute(array($name));
        echo "<p>検索ワード：".htmlspecialchars($search, ENT_NOQUOTES, "utf-8")."</p>";
        echo "<p> 商品 | 価格 </p>";
        //print_r ($statement->fetch(PDO::FETCH_ASSOC));
        while( $row = $statement->fetch(PDO::FETCH_ASSOC) ){
            print('<p>');?>
            <form action="data_manage.php" method="GET">
                <?php echo htmlspecialchars( $row['data'],   ENT_NOQUOTES, 'utf-8');?>
                <?php echo htmlspecialchars( $row['value'],  ENT_NOQUOTES, 'utf-8');?>
                <input type="hidden" name="data"  value="<?php echo htmlspecialchars( $row['data'],  ENT_NOQUOTES, 'utf-8'); ?>">
                <input type="hidden" name="value" value="<?php echo htmlspecialchars( $row['value'], ENT_NOQUOTES, 'utf-8'); ?>">
                <input type="submit" value="編集">
            </form>
      <?php print('</p>');
        }
        $pdo = null;
    }catch(PDOExeption $e){
        //echo $e->getMessage()."</br>";
        echo "データベースエラー";
    }
?>