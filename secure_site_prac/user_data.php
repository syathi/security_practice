<head>
    <meta charset="utf-8">
    <title>マイページ</title>
</head>
<body>
<?php
    session_start();
    //echo $_COOKIE["PHPSESSID"];
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
    ini_set( 'display_errors', 1 );
    require_once "MDB2.php";
    header("Content-Type: text/html; charset=utf-8");
    $search   = $_GET["search"];
    $user     = 'root';
    $password = 'root';
    $db       = 'sotuen';
    $host     = 'localhost';
    $port     = 3306;
    

    //$mdb2 = MDB2::connect("mysqli://".$user.":".$password."@".$host.":".$port."/".$db);
    try{
        $pdo  = new PDO("mysql:host=".$host.";dbname=".$db.";charset=utf8mb4", $user, $password);
        // $link = mysql_connect("$host:$port", $user, $password);
        // if(!$link){
        //     die("failed to connect mysql ");
        // }
        // $db_selected = mysql_select_db($db, $link);
        // if (!$db_selected){
        //     die('failed to connect db ');
        // }
        // mysql_set_charset('utf8');
        $query = "select data, value from user_data where user_name= ? ";
        if($search){
            $query = $query." and data= ? ";
        }
        $query = $query. ";";
        $statement = $pdo->prepare($query);
        //$result = mysql_query($query);
        //$statement = $search ? $mdb2->prepare($query, array("text", "text")) : $mdb2->prepare($query, array("text")); 
        //$res       = $search ? $mdb2->execute(array($name, $search)) : $mdb2->execute(array($name));         
        // if(!$result){
        //     die('failed query ');
        // }
        $statement = $search ? $statement->excecute(array($name, $search)) : $statement->execute(array($name));
        echo "<p>検索ワード：".htmlspecialchars($search, ENT_NOQUOTES, "utf-8")."</p>";
        echo "<p> 商品 | 価格 </p>";
        foreach( $pdo->query($query) as $row ){
            print('<p>');
            print($row['data']);
            print(" ".$row['value']);
            print('</p>');
        }
        // while( $row = mysql_fetch_assoc($result) ){
        //     print('<p>');
        //     print($row['data']);
        //     print(" ".$row['value']);
        //     print('</p>');
        // }
        // $close_flag = mysql_close($link);
        $pdo = null;
    }catch(PDOExeption $e){
        echo $e->getMessage()."</br>";
    }
?>
