<?php

require_once(PATH_MODELS . "CSVParser.php");

class BlocResponsibleController {

	private $_db;
	public function __construct($db) {
		$this->_db = $db;
	}
		
	public function run(){
// 		user must be an admin or a bloc(s) responsible to access manage a bloc
		if (empty ( $_SESSION ['authenticated']) || $_SESSION['authenticated'] == 'student' || $_SESSION['authenticated'] == 'professor') {
			header ( 'Location: index.php?action=login' );
			die ();
		}
		if (isset($_POST['formUEUpload'])) {
			$update_message = $this->formUE();
		}

		$action = (isset ( $_GET ['action'] )) ? htmlentities ( $_GET ['action'] ) : 'default';
		switch ($action) {
			case 'series':
				$this->blocResponsibleSeries();
				break;
			case 'seance_templates':
				require_once(PATH_VIEWS . "bloc_responsible_seance_templates.php");
				break;
			default:
				require_once(PATH_VIEWS . "bloc_responsible.php");
				break;
		}

	}
	
	
	public function blocResponsibleSeries() {
		
		if (isset($_POST['insert'])) {
			
		} else if (isset($_POST['change'])) {
			
		} else {
			$arrayStudentsNotInSeries = $this->_db->select_students_not_in_series_from_bloc($bloc);
			print_r($arrayStudentsNotInSeries);
		}
		
	}
	
	
	public function formUE() {
		
		if (!empty($_FILES['inputUEFile']['name'])) {
			if (!preg_match ( '/^programme_bloc' . $_POST['inputBloc'] . '.csv$/', $_FILES['inputUEFile']['name'])) {
				return Array(
						"error_code"=>"danger",
						"error_message"=>"Le fichier " . $_FILES['inputUEFile']['name'] . " ne dispose pas du bon format."
				);
			}
			$origine = $_FILES['inputUEFile']['tmp_name'];
			$destination = 'conf/programme_bloc' . $_POST['inputBloc'] . '.csv';
			move_uploaded_file($origine, $destination);
			
			$insertCounter = 0;
			
			$UEfile = file($destination);
			
			foreach ($UEfile as $key => $UE){
				
				preg_match( '/^(.*);(.*);(.*);(.*);(.*);(.*)$/', $UE, $result);
						
				$name = $result[1];
				$code = $result[2];
				$term = $result[3];
				$course_unit_learning_activity = $result[4];
				$ects = $result[5];
				
				if (preg_match('/,/',$ects)) {
					$ects = str_replace(",", ".", $ects);
				}
				
				$abbreviation = $result[6];
				$bloc = $_POST['inputBloc'];
				
				if ($key != 0) {
					if (!$this->_db->existing_course($code)) {
						
						$this->_db->insert_course($code, $name, $term, trim($ects), $bloc, $abbreviation, $course_unit_learning_activity);
						$insertCounter++;
					}
				}
			}
			
			return Array(
					"error_code"=>"success",
					"error_message"=>"Le nouveau fichier de programme du bloc " . $_POST['inputBloc'] . " a bien été pris en compte. " . $insertCounter . " entrées ont été ajoutées."
			);
		}
	}

}