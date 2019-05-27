<?php 

class controller_contact extends Controller
{
	
	function __construct()
	{
		
	}

	function action_index() {
		$this->view = new View();
		$this->view->generate('view_contact', 'view_template_index');
	}

	function action_contact() {
		echo "Логирование в админ панели!";
	}
}
?>