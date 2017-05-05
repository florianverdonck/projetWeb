<?php
class ProfessorController {
	private $_db;
	public function __construct($db) {
		$this->_db = $db;
	}
	public function run() {
		// user must be an admin, a professor and a bloc(s) responsible to access attendances
		if (empty ( $_SESSION ['authenticated'] ) || $_SESSION ['authenticated'] == 'student') {
			header ( 'Location: index.php?action=login' );
			die ();
		}
		
		$sorted_attendances = false;
		$update_message = $students = $seances_templates = '';
		$seances_created = $this->_db->existing_seances ();
		
		// Loads a more in depth form based on previous in puts
		if (isset ( $_POST ['bloc'] ) && isset ( $_POST ['term'] )) {
			$seances_templates = $this->_db->select_seance_templates ( $_POST ['bloc'], $_POST ['term'] );
			$series = $this->_db->select_series_from_bloc_term ( $_POST ['bloc'], $_POST ['term'] );
			$term_for_week = 'q' . $_POST['term'];
			$weeks = $this->_db->select_weeks_term($term_for_week);
			$sorted_attendances = true;
		}
		
		// Sorts students by seance, serie, term and bloc  
		if (! empty ( $_POST ['form_sort_attendances'] ) || ! empty ( $_POST ['form_take_attendances'] ) || ! empty ( $_POST ['form_add_student_attendance'] )) {
			$update_message = $this->formSortAttendance ();
			// everything went well, no error message
			if (! isset ( $update_message )) {
				$professor = unserialize($_SESSION['user']);	
				// attendance sheet isn't created yet
				if (! $this->_db->existing_attendance_sheet($_POST ['seance'], $professor->mail(), $_POST['week'])) {
					$students = $this->_db->select_students_from_course ( $_POST ['seance'], $_POST ['serie'], $_POST ['term'], $_POST ['bloc'] );
					$attendance_sheet = $this->_db->insert_attendance_sheet($_POST ['seance'], $professor->mail(), $_POST['week']);
					if (!empty ($students)) {
						foreach ($students as $student) {
// 							$this->_db->insert_attendance($attendance_sheet_id, $student->mail());
							
						}
					}
				} else {
					
				}
			}
		}
		
		// Takes attendances for listed students
		if (! empty ( $_POST ['form_take_attendances'] )) {
			$update_message = array (
					"error_code" => "success",
					"error_message" => "Les présences ont été prises." 
			);
		}
		
		// Allows the professor to add a student which isn't from the current serie
		if (!empty ($_POST['form_add_student_attendance'])) {
			$update_message = $this->formAddStudent ( $students );
			if($update_message['error_code'] == 'success') {
				$students [] = $this->_db->select_student($_POST['student_mail']);
			}				
		}		
		$sorted_attendances ? require_once (PATH_VIEWS . "professor.attendances_sorted.php") : require_once (PATH_VIEWS . "professor.php");
	}
	
	private function formAddStudent( $students ) {
		if (empty ($_POST ['student_mail'])) {
			return array (
					"error_code" => "danger",
					"error_message" => "Le mail de l'élève doit être complété."
			);
		}
		if (!$this->_db->existing_student($_POST ['student_mail'])) {
			return array (
					"error_code" => "danger",
					"error_message" => "Le mail ne correspond a aucun élève."
			); 
		}
		return array (
				"error_code" => "success",
				"error_message" => "L'élève a été correctement ajouté"
		);
	}

		
	// Returns errors messages if form inputs are not correctly set
	private function formSortAttendance() {
		switch ($_POST) {
			case $_POST ['bloc'] :
				return array (
						"error_code" => "danger",
						"error_message" => "Veuillez sélectionner un bloc." 
				);
			case ! isset ( $_POST ['term'] ) :
				return array (
						"error_code" => "danger",
						"error_message" => "Veuillez sélectionner un quadristre." 
				);
			case ! isset ( $_POST ['seance'] ) :
				return array (
						"error_code" => "danger",
						"error_message" => "Veuillez sélectionner une séance." 
				);
			case ! isset ( $_POST ['week'] ) :
				return array (
						"error_code" => "danger",
						"error_message" => "Veuillez sélectionner une semaine." 
				);
			case ! isset ( $_POST ['serie'] ) :
				return array (
						"error_code" => "danger",
						"error_message" => "Veuillez sélectionner une série." 
				);
			case ! isset ( $_POST ['attendance_type'] ) :
				return array (
						"error_code" => "danger",
						"error_message" => "Veuillez sélectionner un type de présence." 
				);
		}
	}
}