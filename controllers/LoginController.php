<?php
	 
class LoginController {
	
	public function __construct() {
	
	}
			
	public function run(){	

		if (isset($_POST['inputEmail'])) {
			print_r($_POST);
		}

		require_once(PATH_VIEWS . "login.php");
		
	}
	
}
