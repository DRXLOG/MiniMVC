<?php 

class controller_order extends Controller
{
	
	function __construct()
	{

	}

	function action_index() {
		$this->view = new View();
		$this->view->generate('view_order', 'view_template_index');
	}



}

?>