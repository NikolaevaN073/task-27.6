<?php
class View
{
	function generate($content_view, $template_view, $data = null, $title = '')
	{
		include 'app/views/'.$template_view;		
	}
}
