<?php
	 
class ProfessorController {
	private $_db;
	public function __construct($db) {
		$this->_db = $db;
	}
			
	public function run(){	
		
//		$this->_db->insert_week(13, 2, '11/05/2017);
//		$this->_db->insert_professor('mail@mail', 'test', 'test', 'true');
// 		$this->_db->insert_course('test', 'test', 1, 2, 3, 't', 'UE');
// 		$this->_db->insert_serie(2, 'serie 1 bloc 2');
// 		$this->_db->insert_student('mail@mail.mail', 1, 'Test', 'Test');
// 		$this->_db->insert_seance_template('algo1', 'Notée', 'test');
// 		$this->_db->insert_seance_template('algo2', 'XO', 'test');

		require_once(PATH_VIEWS . "professor.php");
	}
}