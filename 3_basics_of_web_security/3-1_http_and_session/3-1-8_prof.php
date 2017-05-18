<?php
    session_start();
    $name = $_SESSION['name'];
    if( $name == "" ){
        die("ログインしてください!おこ！！");
    }
?>
<html>
<head>
    <meta charset='utf-8'>
    <title>プロフィール</title>
</head>
<body>
    ユーザ名：<?php echo htmlspecialchars($name, ENT_NOQUOTES, 'UTF-8'); ?>
</body>
</html>