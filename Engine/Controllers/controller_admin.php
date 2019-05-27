<?php

class controller_admin extends Controller
{
	
	function __construct()
	{
		
	}

	function action_index() {
		$this->view = new View();
		$this->view->generate('view_admin', 'view_template_index');
	}

	function action_login() {
		echo "Логирование в админ панели!";

	}
}
?>