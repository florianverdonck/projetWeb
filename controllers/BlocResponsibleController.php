<?php

class BlocResponsibleController {
	private $_db;
	public function __construct($db) {
		$this->_db = $db;
	}
		
	public function run(){

		require_once(PATH_VIEWS . "bloc_responsible.php");
		
	}

}