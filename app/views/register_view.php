<?php $url = $_SERVER['REQUEST_URI']; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Регистрация</title>
</head>
<body>
    
</body>
</html>
<div class="container my-5" style="width: 50%;">
<h2>Регистрация</h2>
    <form action="<?php echo $url; ?>" method="post">
        <label for="login" class="form-label">Введите логин</label>
        <input type="email" class="form-control my-3" name="login" placeholder="Email" required>
        <label for="password" class="form-label">Введите пароль</label>
        <input type="password" class="form-control my-3" name="password" placeholder="Password" required>
        <input type="submit" class="btn btn-primary my-3" name="submit" value="Отправить">
    </form>
    <div>
        <a href="index.php?url=authVK" class="btn btn-secondary my-3">Авторизоваться через VK</a>            
    </div>
    <a href="index.php">На главную</a>
    
</div>