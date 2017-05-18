<?php
    session_start();
?>
<html>
<head>
    <meta charset='utf-8'>
    <title>ログイン</title>
</head>
<body>
    <form action="3-1-7_login_check.php" method="POST" >
        ユーザ名：<input type="text" name="name" ></br>
        パスワード：<input type="password" name="pass" ></br>
        <input type="submit" value="ログイン" >
    </form>
</body>
</html>