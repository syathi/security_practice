<?php
    session_start();
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    if($name == "" || $pass == ""){
        die("ログイン失敗");
    }
    $_SESSION['name'] = $name;
?>
<html>
<head>
    <meta charset='utf-8'>
    <title>ログイン確認</title>
</head>
<body>
    ログイン成功しました
    <a href="3-1-8_prof.php">プロフィール</a>
</body>
</html>