<?php

class Model_AuthVK extends Model 
{
    public $client_id = 0; // ID приложения
    public $client_secret = '';  // Защищенный ключ
    public $redirect_uri = 'http://mysite.devel?url=page';  // Адрес сайта
    public $url = 'https://oauth.vk.com/authorize'; // Ссылка для авторизации на стороне VK

    public function get_params () {
        
        $params = [ 
            'client_id' => $this->client_id, 
            'redirect_uri'  => $this->redirect_uri, 
            'response_type' => 'code',
            'v' => '5.126',
            'scope' => 'photos,offline'
        ];      

        return [
            'params' => $params,
            'url' => $this->url
        ];
    }

    public function get_token_params ()
    {
        if (isset($_GET['code'])) {
            $params = [            
                'client_id' => $this->client_id,        
                'client_secret' => $this->client_secret,        
                'code' => $_GET['code'],        
                'redirect_uri' => $this->redirect_uri            
            ];            
        }
        return $params;
    }
}