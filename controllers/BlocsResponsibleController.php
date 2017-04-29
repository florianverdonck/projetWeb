<?php

class BlocsResponsibleController {
	private $_db;
	public function __construct($db) {
		$this->_db = $db;
	}

	public function run(){
	
		if (isset($_POST['formStudentsUpload'])) {
			$update_message = $this->formStudentsUpload();
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
					if (!$this->_db->existing_student($mail)) {
						
						$this->_db->insert_student($mail, $bloc, $lastName, $firstName);
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