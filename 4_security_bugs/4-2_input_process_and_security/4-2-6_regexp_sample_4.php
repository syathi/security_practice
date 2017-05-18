<?php
    $addr = isset($_GET['addr']) ? $_GET['addr'] : '';
    if( preg_match('/\A[[:^cntrl:]]{1,30}\z/u', $addr) == 0 ){
        die('input address with 1 ~ 30 characters. you can not use control characters.');
    }
?>
<meta charset="utf-8">
<body>
    住所：<?php echo htmlspecialchars($addr, ENT_NOQUOTES, "utf-8"); ?>
</body>