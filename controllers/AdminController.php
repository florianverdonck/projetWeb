<?php
	 
class AdminController {
	private $_db;
	public function __construct($db) {
		$this->_db = $db;
	}
			
	public function run(){	
		$update_message = '';
		if (! empty ( $_POST ['form_agenda'] )) {
			$update_message = 'ok 1 ';
			if (! empty ( $_FILES ['userfile'] ['name'] )) {
				$update_message = 'ok 2';
				if (! preg_match ( '/\.agenda/', $_FILES ['userfile'] ['name'] )) {
					$update_message =  'Le format est invalide.';
				}
			}
		}
		require_once (PATH_VIEWS . 'admin.php');
		
	}
	
}
