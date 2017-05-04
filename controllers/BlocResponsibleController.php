<?php

require_once(PATH_MODELS . "CSVParser.php");

class BlocResponsibleController {

	private $_db;
	private $_professor;
	
	
	public function __construct($db) {
		$this->_db = $db;
		$this->_professor = unserialize($_SESSION['user']);
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
		
		if (isset($_POST['formChangeSerie'])) {
			if (isset($_POST['originSerie']) && isset($_POST['studentMail']) && isset($_POST['destinationSerie'])) {
				$update_message = $this->formChangeSerie();
				print_r($_POST);
			} else {
				$update_message = array (
				"error_code" => "danger",
				"error_message" => "Le changement de série a échoué. Un des paramètres de la requête est manquant."
				);
			}
		}
		
		if (isset($_POST['formInsertSerie'])) {
			if (isset($_POST['studentMail']) && isset($_POST['destinationSerie'])) {
				$update_message = $this->formChangeSerie();
				print_r($_POST);
			} else {
				$update_message = array (
				"error_code" => "danger",
				"error_message" => "Le changement de série a échoué. Un des paramètres de la requête est manquant."
				);
			}
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
		
		if (!isset($_GET['bloc'])) {
		
			if ($this->_professor->responsible() == "bloc1") {
				$_GET['bloc'] = 1;
			}
				
			if ($this->_professor->responsible() == "bloc2") {
				$_GET['bloc'] = 2;
			}
			
			if ($this->_professor->responsible() == "bloc3") {
				$_GET['bloc'] = 3;
			}
			
			if ($this->_professor->responsible() == "blocs") {
				$_GET['bloc'] = 1;  // Default : for blocs manager -> redirect to Bloc 1 series manager 
			}
		}
		
		$studentsNotInSeries = $this->_db->select_students_not_in_series_from_bloc($_GET['bloc']);
		
		$studentInSerie[] = "";
		$numberOfSeries = $this->_db->select_number_series_from_bloc($_GET['bloc'])->numberSeries;
		
		require_once(PATH_VIEWS . "bloc_responsible_series.php");
		
	}
	
	
	public function formChangeSerie() {
		return array (
				"error_code" => "success",
				"error_message" => "Changement de série."
		);
	}
	
	public function formInsertSerie() {
		return array (
				"error_code" => "success",
				"error_message" => "Insertion série."
		);
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