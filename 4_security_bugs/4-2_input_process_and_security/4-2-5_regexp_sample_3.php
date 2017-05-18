<?php
    mb_regex_encoding('UTF-8');
    $p = isset($_GET['p']) ? $_GET['p'] : '';
    if( mb_ereg('/\A[a-z0-9]{1,5}\z/', $p) === false ){
        die('input 1 ~ 5 alphanumeric characters');
    }
?>
<meta charset="utf-8">
<body>
    pは<?php echo htmlspecialchars($p, ENT_NOQUOTES, "utf-8"); ?>
</body>