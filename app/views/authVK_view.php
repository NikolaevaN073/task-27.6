<?php $url = $_SERVER['REQUEST_URI']; ?>
<html>
<body>
    <p><a href="<?php echo $data['url'] . '?' . urldecode(http_build_query($data['params']));?>">Аутентификация через ВКонтакте</a></p>  
</body>
</html>