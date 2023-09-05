<?php $url = $_SERVER['REQUEST_URI']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/template_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>task 27</title>
</head>
<body>
    <header>
        <div class="container">            
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="index.php?url=register">Регистрация</a>
                        <?php if (!isset($_COOKIE['user_id'])): ?>
                            <a class="nav-link" href="index.php?url=auth">Войти</a> 
                        <?php else:  ?>    
                            <a class="nav-link" href="index.php?url=logout">Выйти</a> 
                        <?php endif ?>                                 
                    </div>
                </div>
            </div>
            </nav>   
        </div> 
        <hr>
    </header>
    <div class="container">       
        <?php include $content_view; ?>                
    </div>   
</body>
</html>
