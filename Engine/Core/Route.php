<?php 


class Route
{
	public $controller_name;
	public $controller_path;
	public $controller_file;	

	public $model_name;
	public $model_path;
	public $model_file;

	public $action_name;

	
	function __construct()
	{
		$this->getPath();
		$this->getController();
		$this->init();
	}

	function getPath() {
		$this->controller_path = SITE_PATH.DS.'Engine'.DS.'Controllers'.DS;
		$this->model_path = SITE_PATH.DS.'Engine'.DS.'Models'.DS;
	}

	function getController() {
		$this->controller_name = 'index';
		$this->action_name = 'index';
		$route = $_SERVER['REQUEST_URI'];
		$route = explode('?', $route);
		$route = $route[0];
		//echo $route;
		$route = explode('/', $route);
		//print_r($route);

		if (!empty($route[1])) {
			$this->controller_name = $route[1];
		}

		if (!empty($route[2])) {
			$this->action_name = $route[2];
		}

		$this->controller_file = $this->controller_path.'controller_'.$this->controller_name.'.php';

		if (!file_exists($this->controller_file)) {
			$this->action_name = $this->controller_name;
			$this->model_name = $this->controller_name;
			$this->controller_name = 'index';			 
		}

		$this->model_name = 'model_'.$this->controller_name;
		$this->controller_name = 'controller_'.$this->controller_name;
		$this->action_name = 'action_'.$this->action_name;	
	}

	function init() {
		$this->controller_file = $this->controller_name.'.php';
		$this->controller_path = $this->controller_path.$this->controller_file;
		if (file_exists($this->controller_path)) {
            require_once $this->controller_path;
		} else {
			$this->error404();
		}
		
		$this->model_file = $this->model_name.'.php';
		$this->model_path = $this->model_path.$this->model_file;
		if (file_exists($this->model_path)) {
		    $GLOBALS['model_name'] = $this->model_name;
            require_once $this->model_path;
		}
		$controller = new $this->controller_name($this->model_name);
		$action = $this->action_name;

		if (method_exists($controller, $action)) {
			$controller->$action();
		} else {
			$this->error404();
		}
	}

	/*function init() {
		$this->path = SITE_PATH.DS.'Engine'.DS.'Controllers'.DS.'controller_'.$this->controller.'.php';
		echo $this->path;
		//Контроллер найден
		if (file_exists($this->path)) {
			include $this->path;
			if ($this->controller == 'index') {
				$controller = 'controller_'.$this->controller;
				$action = 'action_'.$this->controller;
				$controller = new $controller;
				$controller->$action();
			} else if($this->action == null) {
				$controller = 'controller_'.$this->controller;
				$action = 'action_index';
				$controller = new $controller;
				if (method_exists($controller, $action)) {
					$controller->$action();	
				} else {
					$this->error404();					
				}

			} else {
				$controller = 'controller_'.$this->controller;
				$action = 'action_'.$this->action;
				$controller = new $controller;
				if (method_exists($controller, $action)) {
					$controller->$action();	
				} else {
					$this->error404();					
				}								
			}
		//Контроллер не найден проверка методов на главной
		} else if(!file_exists($this->path)) {
			$this->action = $this->controller;
			$this->controller = "index";
		$this->path = SITE_PATH.DS.'Engine'.DS.'Controllers'.DS.'controller_'.$this->controller.'.php';
			include $this->path;
			$controller = 'controller_'.$this->controller;
			$action = 'action_'.$this->action;
			$controller = new $controller;
			//Контроллер найден успешно
			if (method_exists($controller, $action)) {
				$controller->$action(); 
			//Контроллер не найден 
			} else {
				$this->error404();
			}		
		} 
	}*/

	function error404() {
		echo "Страница не найдена!";
	}

}
?>