<?php
     ini_set( 'display_errors', 1 ); 
    header("Content-Type: text/html; charset=utf-8");
    $name     = $_POST["name"];
    $pass     = $_POST["pass"];
    $user     = 'root';
    $password = 'root';
    $db       = 'sotuen';
    $host     = 'localhost';
    $port     = 3306;

    try{
        $pdo       = new PDO("mysql:host=".$host.";dbname=".$db.";charset=utf8mb4", $user, $password);
        $statement = $pdo->prepare("insert into `secure_users` (`name`, `pass`) values (?, ?);");
        $statement->execute(array($name, $pass));
        $pdo = null;
    }catch(PDOExeption $e){
        //echo $e->getMessage()."</br>";
        echo "データベースエラー";
    }
?>
<body>
    <p>登録しました</p>
    <p><a href="login_form.html">ログイン</a></p>
</body>