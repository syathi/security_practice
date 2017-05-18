<head>
    <meta charset="utf-8">
    <title>認証</title>
</head>
<body>
<?php 
    session_start();
    header("Content-Type: text/html; charset=utf-8");
    $name     = $_POST["id"];
    $pass     = $_POST["pass"];
    $user     = 'root';
    $password = 'root';
    $db       = 'sotuen';
    $host     = 'localhost';
    $port     = 3306;

    try{
        $pdo       = new PDO("mysql:host=".$host.";dbname=".$db.";charset=utf8mb4", $user, $password);
        $query     = "select * from secure_users where name= ? and pass = ?;";
        $statement = $pdo->prepare($query);
        $statement->execute(array($name, $pass));
        if( $result = $statement->fetch(PDO::FETCH_ASSOC) ){
            $_SESSION["name"] = $name;
            setcookie("PHPSESSID", session_id());
            echo  "<p>ログインしました</p>";
            echo "<a href='user_data.php'>まいぺーじ</a>";
        } else {
            echo "<p>ログインできませんでした</p>";
            echo "<a href='login_form.html'>ログインしなおす</a>";
        }
        $pdo = null;
    }catch(PDOExeption $e){
        //echo $e->getMessage()."</br>";
        echo "データベースエラー";
    }
?>            
</body>