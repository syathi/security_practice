<?php
function unicode_escape($matches){
    $u16 = mb_convert_encoding($matches[0], 'UTF-16');
    return preg_replace('/[0-9a-f]{4}/', '\u$0', bin2hex($u16));
}

function escape_js_string($s){
    return preg_replace_callback('/[^-\.0-9a-zA-Z]+/u', 'unicode_escape', $s);
}
?>
<meta charset='utf-8'>
<script>
    alert('<?php echo escape_js_string('吉abcあいう'); ?>');
</script>