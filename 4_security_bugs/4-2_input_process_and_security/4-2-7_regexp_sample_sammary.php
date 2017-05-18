<?php
    function getParam($key, $pattern, $error){
        $val = isset($_GET[$key]) ? $_GET[$key] : '';
        if( !mb_check_encoding($val, 'Shift_JIS') ){
            die("illegal encoding");
        }
        $val = mb_convert_encoding($val, 'utf-8', 'Shift_JIS');
        if( preg_match($pattern, $val) == 0 ){
            die($error);
        }
        return $val;
    }
    
    $name = getParam('name', '/\A[[:^cntrl:]]{1,20}\z/', 'input name with 1 ~ 20 characters. you can not use control characters.');
?>
<meta charset="utf-8">
<body>
    名前は<?php echo htmlspecialchars($name, ENT_NOQUOTES, 'utf-8'); ?>
</body>