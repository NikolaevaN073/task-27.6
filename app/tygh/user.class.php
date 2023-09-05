<?php

class User 
{
	public $user_id;
    public $login;
	public $hashedPassword;
    public $token;
    public $role;
     
    public function get_user_by_login(string $login)
    {
        $db = new DB;
        $user_data = $db-> get_data('users', 'login', $login);
        return $user_data;
    }
    
	public function get_user_by_id (int $id)
    {
        $db = new DB;
        $user_data = $db-> get_data('users', 'user_id', $id);
        return $user_data;
    }

    public function add_token (array $token, array $user_id)
    {
        $db = new DB;
        $db->update('users', $token, $user_id);
    }

}