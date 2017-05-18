<meta charset="utf-8">
<body>
    こんにちは<span id="name"></span>さん
    <script type="text/javascript">
        document.URL.match(/name=([^&]*)/);
        document.write(unescape(RegExp.$1));
    </script>
</body>
