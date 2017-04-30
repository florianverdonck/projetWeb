<?php
	 
class StudentController {
	private $_db;
	public function __construct($db) {
		$this->_db = $db;
	}
			
	public function run(){	
		// user must be a student
		if (empty ( $_SESSION ['authenticated']) || $_SESSION['authenticated'] != 'student') {
			header ( 'Location: index.php?action=login' );
			die ();
		}
		require_once(PATH_VIEWS . "student.php");
	}	
}
