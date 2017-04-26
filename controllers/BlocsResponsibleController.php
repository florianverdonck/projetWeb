<?php

class BlocsResponsibleController {
	private $_db;
	public function __construct($db) {
		$this->_db = $db;
	}

	public function run(){

		require_once(PATH_VIEWS . "blocs_responsible.php");
		
	}

}