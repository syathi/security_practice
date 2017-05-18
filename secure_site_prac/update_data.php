<?php
    session_start();
    header("Content-Type: text/html; charset=utf-8");
    $name     = $_SESSION["name"];
    $data     = $_POST["data"];
    $value    = $_POST["value"];
    $token    = $_POST["token"];
    $old_data = $_POST["old_data"];
    $old_val  = $_POST["old_value"];
    $user     = 'root';
    $password = 'root';
    $db       = 'sotuen';
    $host     = 'localhost';
    $port     = 3306;

    try{
        $pdo       = new PDO("mysql:host=".$host.";dbname=".$db.";charset=utf8mb4", $user, $password);
        $query     = "update user_data set data = ? ,value = ? where user_name = ? and data = ? and value = ?;";
        $statement = $pdo->prepare($query);  
        if( session_id() == $token ){
            $executed  = $statement->execute( array(htmlspc($data), htmlspc($value), $name, htmlspc($old_data), htmlspc($old_val)) );
            if( $executed ){
                echo "<p>更新しました</p>";
            } else {
                echo "<p>更新に失敗しました</p>";
            }
        } else {
            echo "<p>正規の画面から操作してください</p>";
        }
        echo "<a href='user_data.php'>マイページ</a>";
        $pdo = null;
    }catch(PDOExeption $e){
        //echo $e->getMessage()."</br>";
        echo "データベースエラー";
    }

    function htmlspc($data){
        return htmlspecialchars($data, ENT_NOQUOTES, "utf-8");
    }
?>