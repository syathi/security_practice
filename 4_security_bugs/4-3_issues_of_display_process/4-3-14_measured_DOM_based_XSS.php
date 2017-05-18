<meta charset="utf-8">
<body>
    こんにちは<span id="name"></span>さん
    <script type="text/javascript">
        if( document.URL.match(/name=([^&]*)/) ){
            document.getElementById("name").innerText = unescape(RegExp.$1);
        }
    </script>
</body>
