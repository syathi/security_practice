<head>
    <meta charset="utf-8">
    <title>認証</title>
</head>
<body>
<?php
    //require_once "MDB2.php";
    session_start();
    header("Content-Type: text/html; charset=utf-8");
    $name     = $_POST["id"];
    $pass     = $_POST["pass"];
    $user     = 'root';
    $password = 'root';
    $db       = 'sotuen';
    $host     = 'localhost';
    $port     = 3306;

    //$mdb2 = MDB2::connect("mysql://".$user."@".$password."@".$host."/".$db);
    //echo $mdb2;
    $link = mysql_connect("$host:$port", $user, $password);
    if(!$link){
        die("failed to connect mysql ");
    }
    $db_selected = mysql_select_db($db, $link);
    if (!$db_selected){
        die('failed to connect db ');
    }
    mysql_set_charset('utf8');
    $query = "select * from secure_users where name='". $name. "' and pass='". $pass. "';";
    $result = mysql_query($query);
    //echo $query;
    if(!$result){
        die('faild query ');
    }
    if( $row = mysql_fetch_assoc($result) ){
        $_SESSION["name"] = $name;
        setcookie("PHPSESSID", session_id());
?>
        <p>ログインしました</p>
        <a href="user_data.php">まいぺーじ</a>        
<?php
    }else{
?>
        <p>ログインできませんでした</p>
        <a href="login_form.html">ログインしなおす</a>
<?php
    }
    $close_flag = mysql_close($link);
?>
</body>