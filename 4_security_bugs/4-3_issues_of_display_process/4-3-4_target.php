<html>
<head>
    <meta charset="utf-8">
    <title>粗大ゴミ受付</title>
</head>
<body>
    <form action="#" method="POST">
        氏名 <input type="text" name="name" value="<?php echo @$_POST['name'] ?>"></br>
        住所 <input type="text" name="addr" value="<?php echo @$_POST['addr'] ?>"></br>    
        電話番号 <input type="text" name="tel" value="<?php echo @$_POST['tel'] ?>"></br>
        品目 <input type="text" name="kind" value="<?php echo @$_POST['kind'] ?>">
        数量 <input type="text" name="num" value="<?php echo @$_POST['num'] ?>"></br>
        <input type="submit"  value="申し込み">
    </form>
</body>
</html>