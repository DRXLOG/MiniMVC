<?php 
error_reporting (E_ALL); 
define ('DS', DIRECTORY_SEPARATOR);
$sitePath = realpath(dirname(__FILE__) . DS);
define ('SITE_PATH', $sitePath);
define('MAIN_JS_PATH', 'templates'.DS.'Main'.DS.'Main_Content'.DS.'js'.DS);
define('MAIN_CSS_PATH', 'templates'.DS.'Main'.DS.'Main_Content'.DS.'css'.DS);
define('MAIN_IMG_PATH', 'templates'.DS.'Main'.DS.'Main_Content'.DS.'img'.DS);
define('MAIN_MODEL_PATH', 'Engine'.DS.'Models'.DS);

spl_autoload_register(function ($class) {
	$path = SITE_PATH.DS.'Engine'.DS.'Core'.DS.$class.'.php';
	if (file_exists($path)) {
        require_once $path;
	} else {
		throw new Exception("Файла не существует", 1);
		
	}
});
$Route = new Route();
?>