<?php

class BlocResponsibleController {
	private $_db;
	public function __construct($db) {
		$this->_db = $db;
	}
		
	public function run(){

		$action = (isset ( $_GET ['action'] )) ? htmlentities ( $_GET ['action'] ) : 'default';
		switch ($action) {
			case 'series':
				require_once(PATH_VIEWS . "bloc_responsible_series.php");
				break;
			case 'seance_templates':
				require_once(PATH_VIEWS . "bloc_responsible_seance_templates.php");
				break;
			default:
				require_once(PATH_VIEWS . "bloc_responsible.php");
				break;
		}

	}

}