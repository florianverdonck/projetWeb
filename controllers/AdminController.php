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
		if (! empty ($_POST['form_professors'])) {
			$update_message = $this->formProfessors ();
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
			foreach ( $fcontents as $icontent ) {
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
	private function formProfessors() {
		if (! empty ( $_FILES ['userfile'] ['name'] )) {
			// checks if file extension is csv
			if (! preg_match ( '/\.csv/', $_FILES ['userfile'] ['name'] )) {
				$update_message['error_code'] = 'danger';
				$update_message['error_message'] = 'Le fichier doit avoir une extension .csv';
				return $update_message;
			}
			// saves professors file to conf directory
			$origine = $_FILES ['userfile'] ['tmp_name'];
			$destination = 'conf/professeurs.csv';
			move_uploaded_file ( $origine, $destination );
			$fcontents = file ( $destination );
			// inserts each professor in the db
			$test = 0;
			foreach ( $fcontents as $icontent ) {
				if ($test != 0) {
					preg_match ( '/^(.*);(.*);(.*);(.*)$/', $icontent + 1, $result );
					if (!empty($result))
						$this->_db->insert_professor($result[1],$result[2],$result[3],$result[4]);
				}
				$test++;
			}
			$update_message['error_code'] = 'success';
			$update_message['error_message'] = 'Les professeurs ont été ajoutés avec succès';
			return $update_message;
		}
	}
}
