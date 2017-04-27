<?php
	 
class LoginController {
	private $_db;
	public function __construct($db) {
		$this->_db = $db;
	}
			
	public function run(){	

		if (isset($_POST['inputEmail'])) {
			print_r($_POST);
		}

		require_once(PATH_VIEWS . "login.php");
		
	}
	
}
