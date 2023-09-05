<?php

class Controller_Page extends Controller 
{   
    function __construct() 
    {     
        $this->model = new Model_Page();   
        $this->view = new View();
    }

    public function action_index() 
    {         
        if (isset($_COOKIE['user_id'])) {
            $available_actions = $this->model->get_data();
            $this->view->generate('page_view.php', 'template_view.php', $available_actions); 
        } else {
            header("Location: index.php?url=auth"); exit();
        }                
    } 
}

