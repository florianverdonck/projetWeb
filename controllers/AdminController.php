<?php
	 
class AdminController {
	private $_db;
	public function __construct($db) {
		$this->_db = $db;
	}
			
	public function run(){	
		if (empty ( $_SESSION ['authenticated']) || $_SESSION ['authenticated'] != 'admin') {
			header ( 'Location: index.php?action=login' );
			die ();
		}
		$update_message = '';
		if (! empty ( $_POST ['form_agenda'] )) {
			$update_message = $this->formAgenda ();
		}
		if (! empty ($_POST['form_professors'])) {
			$update_message = $this->formProfessors ();
		}
		$array_professors = $this->_db->select_professors();
		require_once (PATH_VIEWS . 'admin.php');
		
	}

	private function formAgenda() {
		if (! empty ( $_FILES ['userfile'] ['name'] )) {
			// checks if file extension is properties 
			if (! preg_match ( '/\.properties/', $_FILES ['userfile'] ['name'] )) {
				return array (
						"error_code" => "danger",
						"error_message" => "Le fichier doit avoir une extension .properties."
				);
			}
			// saves agenda file to conf directory
			$origine = $_FILES ['userfile'] ['tmp_name'];
			$destination = 'conf/agenda.properties';
			move_uploaded_file ( $origine, $destination );
			$fcontents = file ( $destination );
			// inserts each weeks in the db
			foreach ( $fcontents as $icontent ) {
				preg_match ( '/^(.*)_(.*)=(.*)$/', $icontent, $result );
				if (!$this->_db->insert_week($result[2],$result[1],trim($result[3]))){
					return array (
							"error_code" => "danger",
							"error_message" => "L'ajout n'a pas pu être fait. Veuillez vérifier le contenu de votre fichier."
					);
				}
			}
			return array (
					"error_code" => "success",
					"error_message" => "Les semaines ont été ajoutées avec succès dans l'agenda."
			);
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
			$insertCounter = 0;
			$fcontents = file ( $destination );
			// inserts each professor in the db
			foreach ( $fcontents as $icontent ) {
				preg_match ( '/^(.*);(.*);(.*);(.*)$/', $icontent, $result );
				if (!empty($result) && $result[2] !== 'Nom') {
					if (!$this->_db->existing_professor($result[1])) {
						$insertCounter++;
						$this->_db->insert_professor($result[1],$result[2],$result[3],trim($result[4]));
					}
				}
			}
			return array (
					"error_code" => "success",
					"error_message" => "Le nouveau fichier de professeurs a bien été pris en compte. " . $insertCounter . " entrée(s) ont été ajoutée(s)." 
			);
		}
	}
}
