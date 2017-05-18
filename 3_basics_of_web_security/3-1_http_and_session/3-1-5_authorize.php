<?php
    $user = @$_SERVER['PHP_AUTH_USER'];
    $pass = @$_SERVER['PHP_AUTH_PW'];
     if(!$user || !$pass){
         header('HTTP/1.1 401 Unauthorized');
         header('WWW-Authenticate: Basic realm="Basic AuthenticationSample"');
         echo "ユーザ名とパスワードが必要です";
         exit;
     }
?>
<meta charset='utf-8'>
<body>
認証しました</br>
ユーザ名：<?php echo htmlspecialchars($user, ENT_NOQUOTES, 'UTF-8'); ?></br>
パスワード：<?php echo htmlspecialchars($pass, ENT_NOQUOTES, 'UTF-8'); ?></br>
</body>