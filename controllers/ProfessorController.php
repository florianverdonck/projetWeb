<?php
class ProfessorController {
	private $_db;
	private $_professor;
	public function __construct($db) {
		$this->_db = $db;
		$this->_professor = unserialize ( $_SESSION ['user'] );
	}
	public function run() {
		// user must be an admin, a professor and a bloc(s) responsible to access attendances
		$this->checkPermissions ();
		
		// variables for view
		$sorted_attendances = false;
		$update_message = $students = $seances_templates = '';
		$seances_created = $this->_db->existing_seances ();
		
		// Loads a more in depth form based on previous inputs
		if (isset ( $_POST ['bloc'] ) && isset ( $_POST ['term'] )) {
			$seances_templates = $this->_db->select_seance_templates ( $_POST ['bloc'], $_POST ['term'] );
			$series = $this->_db->select_series_from_bloc_term ( $_POST ['bloc'], $_POST ['term'] );
			$term_for_week = $_POST ['term'];
			$weeks = $this->_db->select_weeks_term ( $term_for_week );
			$sorted_attendances = true;
		}
		
		// Sorts students by seance, serie, term and bloc
		if (! empty ( $_POST ['form_sort_attendances'] )) {
			$update_message = $this->formSortErrorMessage ();
			// if no error message
			if (! isset ( $update_message )) {
				// attendance sheet isn't created yet
				if (! $this->_db->existing_attendance_sheet ( $_POST ['seance'], $_POST ['week'] )) {
					$students = $this->_db->select_students_bloc ( $_POST ['bloc']); 
					$this->_db->insert_attendance_sheet ( $_POST ['seance'], $this->_professor->html_mail(), $_POST ['week']);
					$this->setAllStudentsAbsent ( $students ); // by default all students are absent
				}
				// by default attendance type is defined by the seance template 
				if (!isset($_POST['attendance_type']) || $_POST['attendance_type'] == 'default') {
					$attendance_sheet = $this->_db->select_attendance_sheet ( $_POST ['seance'], $_POST ['week'] );
					$seance_template_id = $attendance_sheet->seance_template_id ();
					$_POST['attendance_type'] = $this->_db->select_attendance_type($seance_template_id);
				}
				$students = $this->fetchStudents ();
			}
		}
			
		// Takes attendances for listed students
		if (! empty ( $_POST ['form_take_attendances'] )) {		
			$update_message = $this->takeAttendances ( );		
			$students = $this->fetchStudents ();
		}
		
		// Allows the professor to add a student which isn't from the current serie
		if (! empty ( $_POST ['form_add_student_attendance'] )) {
			
			$update_message = $this->formAddErrorMessage ( $students );
			if ($update_message ['error_code'] == 'success') {
				$update_message = $this->addStudentAnotherBloc ();
			}
			$students = $this->fetchStudents ();
		}
		$sorted_attendances ? require_once (PATH_VIEWS . "professor.attendances_sorted.php") : require_once (PATH_VIEWS . "professor.php");
	}
	
	private function takeAttendances( ) {
		$attendance_sheet_id = $this->getAttendanceSheetId ();
		foreach ( $_POST ['attendance'] as $student => $attendance ) {
			$st = substr ( ( string ) $student, 1, 4 );
			$this->_db->update_attendance ( $attendance_sheet_id, $st, $attendance );
		}
		if (isset ( $_POST ['sick_note'])) {
			foreach ( $_POST ['sick_note'] as $student => $sick_note ) {
				$st = substr ( ( string ) $student, 1, 4 );
				$this->_db->update_sick_note ( $attendance_sheet_id, $st, $sick_note );
			} 
		}
		return array (
				"error_code" => "success",
				"error_message" => "Les présences ont été enregistrées." 
		);
	}
	
	private function getAttendanceSheetId() {
		$attendance_sheet = $this->_db->select_attendance_sheet ( $_POST ['seance'], $_POST ['week'] );
		return $attendance_sheet->attendance_sheet_id ();
	}


	private function checkPermissions() {
		if (empty ( $_SESSION ['authenticated'] ) || $_SESSION ['authenticated'] == 'student') {
			header ( 'Location: index.php?action=login' );
			die ();
		}
	}
	private function addStudentAnotherBloc() {
		$mail_eleve = $_POST ['student_mail'] . '@student.vinci.be';
		$student = $this->_db->select_student ( $mail_eleve );
		$student_id = $student->student_id ();
		$attendance_sheet_id = $this->getAttendanceSheetId ();
		if (! $this->_db->existing_attendance ( $attendance_sheet_id, $student_id )) {
			if ($_POST ['attendance_type'] == 'Noted') {
				$this->_db->insert_attendance ( $attendance_sheet_id, $student_id, 0 );
			} else {
				$this->_db->insert_attendance ( $attendance_sheet_id, $student_id, 'absent' );
			}
			$this->_db->select_students_from_attendances ( $attendance_sheet_id );
			return array (
					"error_code" => "success",
					"error_message" => "L'élève a été ajouté dans la liste en tant qu'absent." 
			);
		} else {
			return array (
					"error_code" => "danger",
					"error_message" => "L'élève est déjà présent dans la liste." 
			);
		}
	}
	
	private function fetchStudents() {
		$attendance_sheet_id = $this->getAttendanceSheetId ();
		if (! isset ( $_POST ['serie'] )) {
			return $this->_db->select_students_from_attendances ( $attendance_sheet_id );
		}
		return $this->_db->select_students_from_attendances ( $attendance_sheet_id, $_POST ['serie'] );
	}
	
	private function setAllStudentsAbsent($students) {
		$attendance_sheet_id = $this->getAttendanceSheetId ();
		if (! empty ( $students )) {
			foreach ( $students as $student ) {
				if ($_POST ['attendance_type'] == 'Noted') {
					$this->_db->insert_attendance ( $attendance_sheet_id, $student_id, 0 );
				} else {
					$this->_db->insert_attendance ( $attendance_sheet_id, $student->student_id(), 'absent' );
				}
			}
		}
	}
	
	// returns error messages if inputs aren't set
	private function formAddErrorMessage($students) {
		if (empty ( $_POST ['student_mail'] )) {
			return array (
					"error_code" => "danger",
					"error_message" => "Le mail de l'élève doit être complété." 
			);
		}
		if (! $this->_db->existing_student ( $_POST ['student_mail'] . '@student.vinci.be' )) {
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
	
	// returns error messages if sort form inputs are not correctly set
	private function formSortErrorMessage() {
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
		}
	}
}