<?php
	 
class StudentController {
	private $_db;
	private $_bloc;
	private $_term;
	private $_student;
	
	public function __construct($db) {
		$this->_db = $db;
		$this->_student = unserialize($_SESSION['user']);
		$this->_bloc = $this->_student->html_bloc();
	}
			
	public function run(){	
		// user must be a student
		if (empty ( $_SESSION ['authenticated']) || $_SESSION['authenticated'] != 'student') {
			header ( 'Location: index.php?action=login' );
			die ();
		}
		
		if (!isset($_GET['term'])) {
			$_GET['term'] = 1;
		}
		
		
		print_r($_POST);
		print_r($_GET);
		
		if (isset($_POST['formSeancesFilter'])) {
			$update_message = $this->formSeancesFilter();
		}
		
		
		$this->_term = $_GET['term'];
		
		$weeks = $this->_db->select_weeks_term($this->_term);
		
		$seanceTemplates = $this->_db->select_seance_templates_student($this->_student->html_student_id(), $this->_term);

		require_once(PATH_VIEWS . "student.php");
	}	
	
	
	public function formSeancesFilter() {
		
		if (isset($_POST['inputWeekSelect']) && isset($_POST['inputUESelect']) && isset($_POST['inputPresenceSelect'])) {
			
			$week = $_POST['inputWeekSelect'];
			$ue = $_POST['inputUESelect'];
			$attendance = $_POST['inputPresenceSelect'];

			
			if ($week == "not_specified") $week = "week_number";
			if ($ue == "not_specified") $ue = "code";
			if ($attendance == "not_specified") $attendance = "attendance";
			
			$attendances = $this->_db->select_student_attendances($this->_student->html_student_id(), "att_sh.week_id", "c.code", "att.attendances");
			
			
			print_r($attendances);

		} else {
			echo "manque param";
		}
	}
	
}
