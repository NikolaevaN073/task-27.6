<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {    

    $user = new User;
    $login_exists = $user->get_user_by_login($_POST['login']);    

    if ($login_exists) {

        echo 'Пользователь с таким логином уже существует';   

    } else {
        
        $user_data = [
            'login' => $_POST['login'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'token' => '' 
        ];  

        $db = new DB;
        $db->insert($user_data, 'users');
        $data = $user->get_user_by_login($_POST['login']);
        $user_id = $data['user_id'];

        $user_perms = [
            'user_id' => $user_id,
            'role_id' => 2
        ];
        $db->insert($user_perms, 'user_role');
        header("Location: index.php?url=auth"); exit();
    }
}

class Controller_register extends Controller 
{       
    function action_index() 
    { 
        $this->view->generate('register_view.php', 'template_view.php');         
    } 
}