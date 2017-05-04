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
		$update_message = '';
		$students = '';
		$weeks_created = $this->_db->existing_weeks ();
		$seances_created = $this->_db->existing_seances ();
		$seances_templates = '';
		
		// Loads a more in depth form based on previous in puts
		if (isset ( $_POST ['bloc'] ) && isset ( $_POST ['term'] )) {
			$seances_templates = $this->_db->select_seance_templates ( $_POST ['bloc'], $_POST ['term'] );
			$series = $this->_db->select_series_from_bloc_term ( $_POST ['bloc'], $_POST ['term'] );
			$sorted_attendances = true;
		}
		
		// Sorts students by seance, serie, term and bloc  
		if (! empty ( $_POST ['form_sort_attendances'] )) {
			$update_message = $this->formSortAttendance ();
			// everything went well, no error message
			if (! isset ( $update_message )) {
				$students = $this->_db->select_students_from_course ( $_POST ['seance'], $_POST ['serie'], $_POST ['term'], $_POST ['bloc'] );
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
			$update_message = array (
					"error_code" => "success",
					"error_message" => "L'élèves a été ajouté dans la liste des présences."
			);
		}
		
		if (! $sorted_attendances) {
			require_once (PATH_VIEWS . "professor.php");
		} else {
			require_once (PATH_VIEWS . "professor.attendances_sorted.php");
		}
	}
	
	// Returns errors messages if form inputs are not correctly set
	private function formSortAttendance() {
		if (empty ( $_POST ['bloc'] )) {
			return array (
					"error_code" => "danger",
					"error_message" => "Veuillez sélectionner un bloc." 
			);
		}
		if (empty ( $_POST ['term'] )) {
			return array (
					"error_code" => "danger",
					"error_message" => "Veuillez sélectionner un quadristre." 
			);
		}
		if (empty ( $_POST ['seance'] )) {
			return array (
					"error_code" => "danger",
					"error_message" => "Veuillez sélectionner une séance." 
			);
		}
		if (empty ( $_POST ['week'] )) {
			return array (
					"error_code" => "danger",
					"error_message" => "Veuillez sélectionner une semaine." 
			);
		}
		
		if (empty ( $_POST ['serie'] )) {
			return array (
					"error_code" => "danger",
					"error_message" => "Veuillez sélectionner une série." 
			);
		}
		
		if (empty ( $_POST ['attendance_type'] )) {
			return array (
					"error_code" => "danger",
					"error_message" => "Veuillez sélectionner un type de présence." 
			);
		}
	}
}