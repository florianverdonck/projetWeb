<?php
class AdminController {
	private $_db;
	public function __construct($db) {
		$this->_db = $db;
	}
	public function run() {
		if (empty ( $_SESSION ['authenticated'] ) || $_SESSION ['authenticated'] != 'admin') {
			header ( 'Location: index.php?action=login' );
			die ();
		}
		$update_message = '';
		if (! empty ( $_POST ['form_agenda'] )) {
			$update_message = $this->formAgenda ();
		}
		if (! empty ( $_POST ['form_professors'] )) {
			$update_message = $this->formProfessors ();
		}
		if (! empty ( $_POST ['form_delete'] )) {
			$update_message = $this->formDeleteData ();
		}
		$array_professors = $this->_db->select_professors ();
		require_once (PATH_VIEWS . 'admin.php');
	}
	
	// inserts a new agenda
	private function formAgenda() {
		if (! empty ( $_FILES ['userfile'] ['name'] )) {
			if ($this->_db->existing_weeks ()) {
				return array (
						"error_code" => "danger",
						"error_message" => "Les données de l'année doivent être supprimées pour upload un nouvel agenda." 
				);
			}
			// checks if file extension is properties
			if (! preg_match ( '/\.properties/', $_FILES ['userfile'] ['name'] )) {
				return array (
						"error_code" => "danger",
						"error_message" => "Le fichier doit avoir une extension .properties." 
				);
			}
			// saves agenda file to conf directory
			$destination = 'conf/agenda.properties';
			$this->move_upload_file ( $destination );
			// inserts each weeks in the db
			$csvFile = file ( $destination );
			foreach ( $csvFile as $line ) {
				preg_match ( '/^q([0-9]+)_semaine([0-9]+)=(.*)$/', $line, $result );
				$result [2] = substr ( $result [2], 0, 6 );
				if (! $this->_db->insert_week ( $result [2], $result [1], trim ( $result [3] ) )) {
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
	
	// inserts professors
	private function formProfessors() {
		if (! empty ( $_FILES ['userfile'] ['name'] )) {
			// checks if file extension is csv
			if (! preg_match ( '/\.csv/', $_FILES ['userfile'] ['name'] )) {
				$update_message ['error_code'] = 'danger';
				$update_message ['error_message'] = 'Le fichier doit avoir une extension .csv';
				return $update_message;
			}
			// saves professors file to conf directory
			$destination = 'conf/professeurs.csv';
			$this->move_upload_file ( $destination );
			// inserts each professor in the db
			$insertCounter = 0;
			$csvFile = file ( $destination );
			foreach ( $csvFile as $line ) {
				preg_match ( '/^(.*);(.*);(.*);(.*)$/', $line, $result );
				if (! empty ( $result ) && $result [2] !== 'Nom') {
					if (! $this->_db->existing_professor ( $result [1] )) {
						$insertCounter ++;
						$this->_db->insert_professor ( $result [1], $result [2], $result [3], trim ( $result [4] ) );
					}
				}
			}
			return array (
					"error_code" => "success",
					"error_message" => "Le nouveau fichier de professeurs a bien été pris en compte. " . $insertCounter . " entrée(s) ont été ajoutée(s)." 
			);
		}
	}
	private function formDeleteData() {
		
		if (isset ( $_POST ['tables'] )) {
			foreach ( $_POST ['tables'] as $table ) {
				$this->_db->delete_table ( $table );
				
				if ($table == 'courses') {
					$files = [
					    'conf/programme_bloc1.csv',
					    'conf/programme_bloc2.csv',
					    'conf/programme_bloc3.csv'
					];
					
					foreach ($files as $file) {
					    if (file_exists($file)) {
					        unlink($file);
					    }
					}
				}
				
				if ($table == 'students') {
					$file = "conf/etudiants.csv";
					if (file_exists($file)) {
					    unlink($file);
					}
				}
				
				if ($table == 'professors') {
					$file = "conf/professeurs.csv";
					if (file_exists($file)) {
					    unlink($file);
					}
				}
				
				if ($table == 'weeks') {
					$file = "conf/agenda.properties";
					if (file_exists($file)) {
					    unlink($file);
					}
				}
				
				if ($table == 'courses') {
					$this->_db->delete_table ('seance_templates');
				}
				
			}
			return array (
					"error_code" => "success",
					"error_message" => "Toutes les données ont été supprimées." 
			);
		}
		return array (
				"error_code" => "danger",
				"error_message" => "Aucune donnée n'a été cochée." 
		);
	}
	
	// upload a file
	private function move_upload_file($destination) {
		move_uploaded_file ( $_FILES ['userfile'] ['tmp_name'], $destination );
	}
}
