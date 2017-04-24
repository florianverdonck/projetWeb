<?php
	
	error_reporting(-1);
	ini_set('display_errors', 'On');

	// GLOBAL VARS FOR MVC PATHS
		
	define("PATH_CONTROLLERS", "controllers/");
	define("PATH_VIEWS", "views/");
	define("PATH_MODELS", "models/");
	
	
	// GLOBAL VARS FOR ASSETS

	define("PATH_RESSOURCES", PATH_VIEWS . "ressources/");
	define("PATH_CSS", PATH_RESSOURCES . "css/");
	define("PATH_IMAGES", PATH_RESSOURCES . "images/");
	define("PATH_FONTS", PATH_RESSOURCES . "fonts/");
	define("PATH_BOOTSTRAP", PATH_RESSOURCES . "bootstrap/");
	define("PATH_BS_CSS", PATH_BOOTSTRAP . "css/");
	define("PATH_BS_IMAGES", PATH_BOOTSTRAP . "images/");
	define("PATH_BS_FONTS", PATH_BOOTSTRAP . "fonts/");
	define("PATH_BS_JS", PATH_BOOTSTRAP . "js/");
	
	
	// GLOBAL VARS FOR LINKS
	
	/*
		EXAMPLE
		define("LOGIN_URL", "index.php?page=login");
	*/


	// Class autoloading
	
	function loadClass($class) {
		require_once(PATH_MODELS . $class . '.class.php');
	}
	
	spl_autoload_register('loadClass');
	
	// Connection to database
	$db = Db::getInstance();

	$page = 'login';
	
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}
	
	switch ($page) {
		
		case 'login':
			require_once(PATH_CONTROLLERS . "LoginController.php");
			$controller = new LoginController($db);
			break;
	
		case 'admin':
			require_once(PATH_CONTROLLERS . "AdminController.php");
			$controller = new AdminController($db);
			break;
			
		case 'professor':
			require_once(PATH_CONTROLLERS . "ProfessorController.php");
			$controller = new ProfessorController($db);
			break;
			
		case 'student':
			require_once(PATH_CONTROLLERS . "StudentController.php");
			$controller = new StudentController($db);
			break;
			
	}
	
	$controller->run();
	
?>