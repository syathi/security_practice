<?php
header("Content-Type: text/html; charset=utf-8");
    $name     = $_POST["name"];
    $pass     = $_POST["pass"];
    $user     = 'root';
    $password = 'root';
    $db       = 'sotuen';
    $host     = 'localhost';
    $port     = 3306;

    $link = mysql_connect("$host:$port", $user, $password);
    if(!$link){
        die("failed to connect mysql ");
    }
    $db_selected = mysql_select_db($db, $link);
    if (!$db_selected){
        die('failed to connect db ');
    }
    mysql_set_charset('utf8');
    $query = "INSERT INTO `secure_users` (`name`, `pass`) VALUES ('". $name. "', '". $pass. "');";
    $result = mysql_query($query);
    //echo $query;
    if(!$result){
        die('faild query ');
    }
   
    $close_flag = mysql_close($link);

?>
<body>
    <p>登録しました</p>
    <p><a href="login_form.html">ログイン</a></p>
</body>