<?php

class Permissions 
{
    public $permissions;    
    public $text_view = false;
    public $image_view = false;

    public function actions (array $permissions)
    {
        foreach ($permissions as $key => $value) {
            if ($permissions[$key] === 'text is available') {            
                $this->text_view = true;                
            } 
            if ($permissions[$key] === 'image is available') {
                $this->image_view = true;
            }  
        }
        
        return [
            'text_view' => $this->text_view,
            'image_view' => $this->image_view
        ];  
    }
}