<?php
    header("Content-Type: text/html; charset=utf-8");
    $author   = $_GET["author"];
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
    $query = "select * from sql_inj_test where author='". $author. "';";
    $result = mysql_query($query);
    //echo $query;
    if(!$result){
        die('faild query '. mysql_error());
    }
    while ($row = mysql_fetch_assoc($result)) {
        print('<p>');
        print('id='.$row['ID']);
        print(', title='.$row['title']);
        print(", author=". $row["author"]);
        print(", publisher=". $row["publisher"]);
        print(", date=". $row["date"]);
        print(", price=". $row["price"]);
        print('</p>');
    }

    $close_flag = mysql_close($link);

?>