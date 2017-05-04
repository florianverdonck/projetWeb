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
		$weeks_created = $this->_db->existing_weeks ();
		$seances_created = $this->_db->existing_seances ();
		$seances_templates = '';
		if (isset ( $_POST ['bloc'] ) && isset ( $_POST ['term'] )) {
			$seances_templates = $this->_db->select_seance_templates ( $_POST ['bloc'], $_POST ['term'] );
			$series = $this->_db->select_series_from_bloc_term ( $_POST ['bloc'], $_POST ['term'] );
		}
		$update_message = '';
		$students = '';
		if (! empty ( $_POST ['form_attendance'] )) {
			$update_message = $this->formAttendance ();
			// everything went well, no error message
			if (!isset($update_message)) {
				$students = $this->_db->select_students_from_course($_POST ['seance'], $_POST['serie'], $_POST['term'], $_POST['bloc']);
			}
		}
		
		// $this->_db->insert_week(13, 2, '11/05/2017);
		// $this->_db->insert_professor('mail@mail', 'test', 'test', 'true');
		// $this->_db->insert_course('test', 'test', 1, 2, 3, 't', 'UE');
		// $this->_db->insert_serie(2, 1, 2);
		// $this->_db->insert_student('mail@mail.mail', 1, 'Test', 'Test');
		// $this->_db->insert_seance_template('algo1', 'Notée', 'test');
		// $this->_db->insert_seance_template('algo2', 'XO', 'test');
		
		require_once (PATH_VIEWS . "professor.php");
	}
	private function formAttendance() {
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
		
		if (empty ($_POST ['attendance_type'])) {
			return array (
					"error_code" => "danger",
					"error_message" => "Veuillez sélectionner un type de présence."
			);
		}
	}
}