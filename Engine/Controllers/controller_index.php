<?php 

class controller_index extends Controller
{
	
	function __construct()
	{

	}

	function action_index() {
		$this->view = new View();
		$this->view->generate('view_index', 'view_template_index');
	}

	function action_login() {
		echo "Эта функция Логирования!";
	}


}

?>