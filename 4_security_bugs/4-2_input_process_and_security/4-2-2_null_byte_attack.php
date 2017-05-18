<meta charset="utf-8">
<body>
    <?php
        $p = $_GET['p'];
        if( ereg('^[0-9]+$', $p) === FALSE ){
            die('input integer');
        }
        echo $p;
    ?>
</body>