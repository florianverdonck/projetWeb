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
			// checks if file extension is properties 
			if (! preg_match ( '/\.properties/', $_FILES ['userfile'] ['name'] )) {
				$update_message['error_code'] = 'danger';
				$update_message['error_message'] = 'Le fichier doit avoir une extension .properties';
				return $update_message;	
			}
			// saves agenda file to conf directory
			$origine = $_FILES ['userfile'] ['tmp_name'];
			$destination = 'conf/agenda.properties';
			move_uploaded_file ( $origine, $destination );
			$fcontents = file ( $destination );
			// inserts each weeks in the db
			foreach ( $fcontents as $i => $icontent ) {
				preg_match ( '/^(.*)_(.*)=(.*)$/', $icontent, $result );
				if (!$this->_db->insert_week($result[2],$result[1],$result[3])){
					$update_message['error_code'] = 'danger';
					$update_message['error_message'] = 'L\'ajout n\'a pas pu être fait. Veuillez vérifier le contenu de votre fichier.';
					return $update_message;
				}
			}
			$update_message['error_code'] = 'success';
			$update_message['error_message'] = 'Les semaines ont été ajoutées dans l\'agenda avec succès';
			return $update_message;
		}
	}	
}
