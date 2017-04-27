<?php
	 
class AdminController {
	private $_db;
	public function __construct($db) {
		$this->_db = $db;
	}
			
	public function run(){	
		$update_message = '';
		if (! empty ( $_POST ['form_agenda'] )) {
			$update_message = $this->formAgenda ();
		}
		require_once (PATH_VIEWS . 'admin.php');
		
	}

	private function formAgenda() {
		if (! empty ( $_FILES ['userfile'] ['name'] )) {
			if (! preg_match ( '/\.properties/', $_FILES ['userfile'] ['name'] )) {
				return 'Le format est invalide.';
			}
			$origine = $_FILES ['userfile'] ['tmp_name'];
			$destination = 'conf/agenda.properties';
			move_uploaded_file ( $origine, $destination );
			$fcontents = file ( $destination );
			foreach ( $fcontents as $i => $icontent ) {
				preg_match ( '/^(.*)_(.*)=(.*)$/', $icontent, $result );
				var_dump($result);
				$this->_db->insert_week($result[2],$result[1],$result[3]);
				return 'Les semaines ont été ajoutées dans l\'agenda avec succès.';
			}
		}
	}	
}
