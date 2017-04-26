<?php
	 
class StudentController {
	private $_db;
	public function __construct($db) {
		$this->_db = $db;
	}
			
	public function run(){	

		include_once(PATH_VIEWS . "student.php");
		
	}
	
}
