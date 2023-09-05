<?php
class Route
{
	public static function start()
	{
		// default
		$controller_name = 'Main';
        $action_name = 'index';
	    $routes = $_GET['url'];
		
		// get controllers name
		if ( !empty($routes) )
		{	
			$controller_name = $routes;
		}
		
		// add prefix
		$model_name = 'model_'.$controller_name;
		$controller_name = 'controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		// get the file (model classes)
		$model_file = strtolower($model_name).'.php';
		$model_path = "app/models/".$model_file;
		if(file_exists($model_path))
		{
			include "app/models/".$model_file;
		}

		// get the file (controller classes)
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "app/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "app/controllers/".$controller_file;
		}
		else
		{			
			Route::ErrorPage404();
		}

		// create controller
		$controller = new $controller_name;
		$action = $action_name;
		if(method_exists($controller, $action))
		{
			$controller->$action();
		}
		else
		{
		    Route::ErrorPage404();
		}
	}

	function ErrorPage404()
	{
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
		header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}
