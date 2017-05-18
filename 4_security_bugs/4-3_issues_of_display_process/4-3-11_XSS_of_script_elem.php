<?php
function escape_js($s){
    return mb_ereg_replace('([\\\\\'"])', '\\\1', $s);
}
?>

<body>
    こんにちは<span id="name"></span>さん
    <script>
        document.getElementById("name").innerText = '<?php echo escape_js($_GET['name']); ?>';
    </script>
</body>
