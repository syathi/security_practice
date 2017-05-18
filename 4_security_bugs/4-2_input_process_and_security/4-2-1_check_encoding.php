<?php
    $name  = isset($_GET['name']) ? $_GET['name'] : "";
    if( !mb_check_encoding($name, 'Shift_JIS') ){
        die("illegal encoding");
    }
    $name = mb_convert_encoding($name, 'UTF-8', 'Shift_JIS');//shift_jis -> utf-8
?>
<meta charset="utf-8">
<body>
    名前は<?php echo htmlspecialchars($name, ENT_NOQUOTES, 'utf-8'); ?>です
</body>