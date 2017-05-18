<?php

class BlocsResponsibleController {
	private $_db;
	public function __construct($db) {
		$this->_db = $db;
	}

	public function run(){
	
// 		user must be an admin or a blocs responsible to access manage blocs
		if (empty ( $_SESSION ['authenticated'] ) || $_SESSION ['authenticated'] == 'student' || $_SESSION ['authenticated'] == 'bloc_responsible' || $_SESSION ['authenticated'] == 'professor') {
			header ( 'Location: index.php?action=login' );
			die ();
		}
		if (isset($_POST['formStudentsUpload'])) {
			$update_message = $this->formStudentsUpload();
		}
		if (isset($_POST['formDelete'])) {
			$update_message = $this->formDelete();
		}

		$action = (isset ( $_GET ['bloc'] )) ? htmlentities ( $_GET ['bloc'] ) : 'default';
		switch ($action) {
			case '1':
				$array_students = $this->_db->select_students_bloc(1);
				require_once(PATH_VIEWS . "blocs_responsible.php");
				break;
			case '2':
				$array_students = $this->_db->select_students_bloc(2);
				require_once(PATH_VIEWS . "blocs_responsible.php");
				break;
			case '3':
				$array_students = $this->_db->select_students_bloc(3);
				require_once(PATH_VIEWS . "blocs_responsible.php");
				break;
			default:
				$array_students = $this->_db->select_students();
				require_once(PATH_VIEWS . "blocs_responsible.php");
				break;
		}
	}

	private function formDelete() {
		
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
	
	public function formStudentsUpload() {
		
		if (!empty($_FILES['inputStudentsFile']['name'])) {
			if (!preg_match ( '/^etudiants.csv$/', $_FILES['inputStudentsFile']['name'])) {
				return Array(
						"error_code"=>"danger",
						"error_message"=>"Le fichier " . $_FILES['inputStudentsFile']['name'] . " ne dispose pas du bon format."
				);
			}
			$origine = $_FILES['inputStudentsFile']['tmp_name'];
			$destination = 'conf/etudiants.csv';
			move_uploaded_file($origine, $destination);
			
			$insertCounter = 0;
			
			$studentsFile = file($destination);
			
			foreach ($studentsFile as $key => $student){
				
				preg_match( '/^(.*);(.*);(.*);(.*)$/', $student, $result);
						
				$mail = $result[4];
				$lastName = $result[2];
				$firstName = $result[3];
				$bloc = $result[1];
				
				$bloc = str_replace("Bloc", "", $bloc);
				
				/*echo "<pre>";
				print_r($result);
				echo "</pre>";*/
				
				if ($key != 0) {
					if (!$this->_db->existing_student(trim($mail))) {
						
						$this->_db->insert_student(trim($mail), $bloc, $lastName, $firstName);
						$insertCounter++;
					}
				}
			}
			
			return Array(
					"error_code"=>"success",
					"error_message"=>"Le nouveau fichier des étudiants a bien été pris en compte. " . $insertCounter . " entrées ont été ajoutées."
			);
		}
	}

}