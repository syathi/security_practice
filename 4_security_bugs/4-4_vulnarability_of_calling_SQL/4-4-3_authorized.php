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

    $link = mysql_connect("$host:$port", $user, $password);
    if(!$link){
        die("failed to connect mysql ". mysql_error());
    }
    $db_selected = mysql_select_db($db, $link);
    if (!$db_selected){
        die('failed to connect db '. mysql_error());
    }
    mysql_set_charset('utf8');
    $query = "select * from users where name='". $name. "' and password='". $pass. "';";
    $result = mysql_query($query);
    //echo $query;
    if(!$result){
        die('faild query '. mysql_error());
    }
    if( $row = mysql_fetch_assoc($result) ){
        echo "ろぐいん";
    }else{
        echo "ろぐいんしっぱい";
    }

    $close_flag = mysql_close($link);
?>