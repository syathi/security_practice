<?php
    $p = isset($_GET['p']) ? $_GET['p'] : '';
    if( preg_match('/^[a-z0-9]{1,5}$/ui', $p) == 0 ){
        die('input 1 ~ 5 alphanumeric characters');
    }
?>
<meta charset="utf-8">
<body>
    pは<?php echo htmlspecialchars($p, ENT_NOQUOTES, "utf-8"); ?>
</body>