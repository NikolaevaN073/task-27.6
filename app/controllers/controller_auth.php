<?php

$_SESSION['CSRF'] = $_SESSION['CSRF'] ?? hash('gost-crypto', random_int(0, 999999));

$user = new User;

if (isset($_COOKIE['user_id'])) {
    $user_data = $user->get_user_by_id(intval($_COOKIE['user_id']));
    $token_db = $user_data['token'];

    if (isset($_COOKIE['token']) && $_COOKIE['token'] === $token_db) {        
        header("Location: index.php?url=page"); exit(); 
    } 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {       

    $user_data = $user->get_user_by_login($_POST['login']);
    $token_CSRF = filter_input(INPUT_POST, 'CSRF', FILTER_SANITIZE_STRING);

    if (!$token_CSRF || $token_CSRF !== $_SESSION['CSRF']) {
        echo 'Ошибка';
    } else {
        if((isset($_POST["login"]))&& (isset($_POST["password"]))) {
                
            $hash = $user_data['password'];
            $user_id = $user_data['user_id'];
            setcookie('user_id', $user_id, time()+60*60*24);

            if (password_verify($_POST['password'], $hash) ) {
                if ($_POST['member']) {      
                        
                    $token = hash('gost-crypto', random_int(0, 999999));  

                    $token_data = [
                        'token' => $token
                    ];
                    $user_id_data = [
                        'user_id' => $user_id
                    ];        

                    $user->add_token($token_data, $user_id_data);                    
                    header("Location: index.php?url=page"); exit(); 
                }                 
                header("Location: index.php?url=page"); exit(); 
            } else {
                echo "Пароль неверный";
            }
        }        
    }          
}

class Controller_auth extends Controller 
{       
    function action_index() 
    { 
        $this->view->generate('auth_view.php', 'template_view.php');         
    } 
}
