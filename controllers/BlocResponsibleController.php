<?php

require_once(PATH_MODELS . "CSVParser.php");

class BlocResponsibleController {

	private $_db;
	private $_professor;
	private $_bloc;
	private $_term;
	
	
	public function __construct($db) {
		$this->_db = $db;
		$this->_professor = unserialize($_SESSION['user']);
		
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
			
			if ($this->_professor->html_responsible() == "blocs") {
				$_GET['bloc'] = 1;  // Default : for blocs manager -> redirect to Bloc 1 series manager 
			}
		}
		
		$this->_bloc = $_GET['bloc'];
		
		
		if (!isset($_GET['term'])) {
		
			$_GET['term'] = 1;
			
		}
		
		$this->_term = $_GET['term'];
		
	}
		
	public function run(){
		
		
		$update_message = "";
 		// user must be an admin or a bloc(s) responsible to access manage a bloc
 		
		if (empty ( $_SESSION ['authenticated']) || $_SESSION['authenticated'] == 'student' || $_SESSION['authenticated'] == 'professor') {
			header ( 'Location: index.php?action=login' );
			die ();
		}
		
		if (isset($_POST['formUEUpload'])) {
			$update_message = $this->formUE();
		}
		
		if (isset($_POST['formChangeSerie'])) {
			$update_message = $this->formChangeSerie();
		}
		
		if (isset($_POST['formInsertSerie'])) {
			$update_message = $this->formInsertSerie();
		}
		
		if (isset($_POST['formAutoFillSeries'])) {
			$update_message = $this->formAutoFillSeries();
		}
		
		if (isset($_POST['formDeleteSerie'])) {
			$update_message = $this->formDeleteSerie();
		}
		
		if (isset($_POST['formAddSeanceTemplate'])) {
			$update_message = $this->formAddSeanceTemplate();
		}

		$action = (isset ( $_GET ['action'] )) ? htmlentities ( $_GET ['action'] ) : 'default';
		switch ($action) {
			case 'series':
				$this->blocResponsibleSeries($update_message);
				break;
			case 'seance_templates':
				$this->blocResponsibleSeanceTemplates($update_message);
				break;
			default:
				require_once(PATH_VIEWS . "bloc_responsible.php");
				break;
		}

	}
	
	
	public function blocResponsibleSeanceTemplates($update_message) {
		
		$weeks = $this->_db->select_weeks_term($this->_term);

		$array_ue = $this->_db->select_courses_bloc_term($this->_bloc, $this->_term);
		
		$array_series = $this->_db->select_series_from_bloc($this->_bloc, $this->_term);
		
		$array_seances_templates = $this->_db->select_seance_templates_grouped($this->_bloc, $this->_term);
		
		require_once(PATH_VIEWS . "bloc_responsible_seance_templates.php");
		
	}
	
	
	public function formAddSeanceTemplate() {
		
		
		if (isset($_POST['inputUESelect']) && isset($_POST['inputSeanceName']) && isset($_POST['presenceType']) && isset($_POST['seriesSelected'])) {
			
			$UE = htmlspecialchars($_POST['inputUESelect']);
			$name = htmlspecialchars($_POST['inputSeanceName']);
			$presenceType = htmlspecialchars($_POST['presenceType']);
			$series = $_POST['seriesSelected'];
			
			$this->_db->insert_seance_template($name, $presenceType, $UE);
			
			$seanceTemplateID = $this->_db->get_last_seance_template_id();
			
			if ($_POST['seriesSelected'][0] == 'all') {
				// User chooses to create given seances for all series, so we get change $series array
				$series = $this->_db->select_series_from_bloc($this->_bloc, $this->_term);
				
				foreach ($series as $key => $serie) {
					$series[$key] = $serie->serie_id();
				}
				
			}
			
			foreach ($series as $key => $serie) {
				
				$this->_db->insert_given_seance($seanceTemplateID, $serie);
				
			}
			
			return array (
				"error_code" => "success",
				"error_message" => "La séance type a bien été ajoutée"
			);
			
		} else {
			
			return array (
				"error_code" => "warning",
				"error_message" => "La séance type n'a pas pu être ajoutée, des paramètres sont manquants"
			);
			
		}
		
		
/*
	
		[inputUESelect] =>
		[inputWeekSelect] => 220
		[presenceType] => x
		[seriesSelected] => all
	
		insert_seance_template($name, $attendance_type, $code);
		
		get_last_seance_template_id();
		
		insert_given_seance($seance_template_id, $serie_id)
*/
	}
	
	
	
	public function blocResponsibleSeries($update_message = "") {
		
		$numberStudents = $this->_db->count_students($this->_bloc);
		
		$studentsNotInSeries = $this->_db->select_students_not_in_series_from_bloc($this->_bloc);
		
		$studentsInSerie = array();
		
		$series = $this->_db->select_series_from_bloc($this->_bloc, $this->_term);
		$numberOfSeries = 0;
		
		if (is_array($series)) {
			$numberOfSeries = count($series);
		} else {
			$numberOfSeries = 0;
		}
		
		foreach ($series as $key => $serie) {
			$studentsInSerie[$serie->html_serie_id()] = $this->_db->select_students_serie_id($serie->html_serie_id());
		}
		
		$maxNumberOfStudentsSerie = 0;
		
		foreach ($studentsInSerie as $key => $serie) {
			$numberOfStudentsInThis = count($serie);
			if ($numberOfStudentsInThis > $maxNumberOfStudentsSerie) {
				$maxNumberOfStudentsSerie = $numberOfStudentsInThis;
			}
		}
		
		
		//studentsSorted = $this->_db->select_students_sorted_in_series($this->_bloc, $this->_term);
		
		
		

		require_once(PATH_VIEWS . "bloc_responsible_series.php");
		
	}
	
	
	public function formAutoFillSeries() {
		
		if (!$this->_db->existing_series($this->_bloc, $this->_term)) {
		
			$numberSeries = htmlspecialchars($_POST['formAutoFillSeries']);
			$numberStudents = $this->_db->count_students($this->_bloc);
			
			$numberStudentsSerie = (int)($numberStudents/$numberSeries);
			$numberOrphanStudents = $numberStudents%$numberSeries;
	
			$students = $this->_db->select_students_bloc($this->_bloc);		
			
			for ($serieNumber = 1; $serieNumber <= $numberSeries; $serieNumber++) {
				$this->_db->insert_serie($this->_term, $this->_bloc, $serieNumber);
			}
			
			$series = $this->_db->select_series_from_bloc($this->_bloc, $this->_term);

			
			$studentsLeftInThisSerie = $numberStudentsSerie;
			$serie = 1;
			$seriePlicPloc = 1;
	
			foreach ($students as $key => $student) {
				if ($studentsLeftInThisSerie == 0) {
					// Il ne reste plus d'étudiants à insérer
					// On réintialise le compteur
					$studentsLeftInThisSerie = $numberStudentsSerie;
					$serie++;
				}
				
				if ($serie <= $numberSeries) {
					$this->_db->update_student_serie($student->mail(), $series[$serie-1]->serie_id());
					$studentsLeftInThisSerie--;
				} else {
					$this->_db->update_student_serie($student->mail(), $series[$seriePlicPloc-1]->serie_id());
					$seriePlicPloc++;
				}
			}
		}
	}
	
	
	public function formDeleteSerie() {
		$serie = $_POST['formDeleteSerie'];
		if ($_POST['formDeleteSerie'] >= 0) {
			if ($this->_db->existing_serie($serie)) {
				$this->_db->delete_serie($serie);
				return array (
				"error_code" => "success",
				"error_message" => "La série a bien été supprimée"
			);
			} else {
				return array (
				"error_code" => "warning",
				"error_message" => "La série n'a pas pu être supprimée, son id n'existe pas dans la base de donnée"
			);
			}	
		} else {
			
			// param missing
			return array (
				"error_code" => "warning",
				"error_message" => "La série n'a pas pu être supprimée, un paramètre est manquant"
			);
		}
		
	}
	
	public function formInsertSerie() {
		
		if (isset($_POST['studentMail']) && isset($_POST['destinationSerie'])) {
			
			$studentMail = htmlspecialchars($_POST['studentMail']);
			$destinationSerie = htmlspecialchars($_POST['destinationSerie']);
		
			$this->_db->update_student_serie($studentMail, $destinationSerie);
			
			return array (
				"error_code" => "success",
				"error_message" => "L'étudiant " . $studentMail . " a bien été placé dans la série " . $destinationSerie
			);
		
		} else {
			return array (
				"error_code" => "warning",
				"error_message" => "L'étudiant n'a pas pu être inséré, paramètre manquant."
			);
		}
		
		
	}
	
	public function formChangeSerie() {
		
		if (isset($_POST['originSerie']) && isset($_POST['studentNumber']) && isset($_POST['destinationSerie'])) {
			
			$originSerie = htmlspecialchars($_POST['originSerie']);
			$studentNumber = htmlspecialchars($_POST['studentNumber']);
			$destinationSerie = htmlspecialchars($_POST['destinationSerie']);
			
			
			$studentMail = "";

			$arrayStudent = $this->_db->select_students_serie_id($originSerie);
			
			
			foreach ($arrayStudent as $key => $student) {
				if (($key+1) == $studentNumber) {
					$studentMail = $student->mail();
				}
			}
			
			if ($destinationSerie != "delete") {
			
				$this->_db->update_student_serie($studentMail, $destinationSerie);
				
				return array (
					"error_code" => "success",
					"error_message" => "L'étudiant " . $studentMail . " a bien été placé dans la série" . $destinationSerie
				);
	
			} else {
				
				$this->_db->update_student_serie_delete($studentMail);
				
				
				return array (
					"error_code" => "success",
					"error_message" => "L'étudiant " . $studentMail . " a bien été enlevé de sa série"
				);
				
			}
		
		} else {
			return array (
				"error_code" => "warning",
				"error_message" => "L'étudiant n'a pas pu être déplacé, paramètre manquant."
			);
		}

	}
	
	
	public function formUE() {
		
		if ($this->_db->ue_file_already_imported($this->_bloc)) {
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
					$term = str_replace("Q", "", $result[3]);
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
		} else {
			return Array(
						"error_code"=>"danger",
						"error_message"=>"Impossible d'importer le programme du bloc car il existe déjà. Veuillez le supprimer d'abord."
				);
		}

	}

}