<?php
	 
class LoginController {
	
	public function __construct() {
	
	}
			
	public function run(){	

		if (isset($_POST['inputEmail'])) {
			print_r($_POST);
		}

		include_once(PATH_VIEWS . "login.php");
		
	}
	
}
