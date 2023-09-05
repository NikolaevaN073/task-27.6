<?php

class Controller_AuthVK extends Controller 
{       
    function __construct() 
    {     
        $this->model = new Model_AuthVK();   
        $this->view = new View();
    }

    function action_index() 
    {  
        $data = $this->model->get_params();           
        $this->view->generate('authVK_view.php', 'template_view.php', $data);              
    }  

    function save_token() 
    {
        $params = $this->model->get_token_params();  
        if (!$content = @file_get_contents('https://oauth.vk.com/access_token?' . http_build_query($params))) {
            $error = error_get_last();
            throw new Exception('HTTP request failed. Error: ' . $error['message']);
        }
     
        $response = json_decode($content);
     
        // Если при получении токена произошла ошибка
        if (isset($response->error)) {
            throw new Exception('При получении токена произошла ошибка. Error: ' . $response->error . '. Error description: ' . $response->error_description);
        }

        //Если все прошло хорошо
                
        $token = $response->access_token; // Токен
        $expiresIn = $response->expires_in; // Время жизни токена
        $userId = $response->user_id; // ID авторизовавшегося пользователя
      
        // Сохраняем токен в сессии
        $_SESSION['token_VK'] = $token;
    }

    function role_update ()
    {
        $user_id = $_COOKIE['user_id'];
        $db = new DB;

        if ($_SESSION['token_VK']) {    
            $db->update('user_role', ['user_id', 'role_id'], [$user_id, 1]);
        } 
    }       
}

