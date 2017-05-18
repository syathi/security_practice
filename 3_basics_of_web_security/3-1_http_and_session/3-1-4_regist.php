<?php
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $sex  = $_POST['sex'];
    //ここに登録の処理 
?>
<html>
<head>
    <meta charset="utf-8">
    <title>登録</title>
</head>
<body>
    氏名：<?php echo htmlspecialchars($name, ENT_NOQUOTES, 'UTF-8'); ?></br>
    メールアドレス：<?php echo htmlspecialchars($mail, ENT_NOQUOTES, 'UTF-8'); ?></br>
    性別：<?php echo htmlspecialchars($sex, ENT_NOQUOTES, 'UTF-8'); ?></br>
    登録されました　
</body>
</html>