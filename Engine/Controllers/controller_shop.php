<?php 

class controller_shop extends Controller
{
	
	function __construct()
	{
		
	}

	function action_index() {
		$this->view = new View();
		$this->view->generate('view_shop', 'view_template_index');
	}

	function action_view() {
		echo "Показ товаров";
	}
}
?>