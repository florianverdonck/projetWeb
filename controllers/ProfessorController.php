<?php
	 
class ProfessorController {
	private $_db;
	public function __construct($db) {
		$this->_db = $db;
	}
			
	public function run(){	
	
		require_once(PATH_VIEWS . "professor.php");
	}
}