<?php

class Model_Page extends Model 
{
    public function get_data() 
    {        
        $db = new DB;
        $user_permissions = $db->get_permissions($_COOKIE['user_id']);        
        $permissions = new Permissions;
        $permissions->actions($user_permissions);

        return [
            'text_view' => $permissions->text_view,
            'image_view' => $permissions->image_view
        ];        
    }
}