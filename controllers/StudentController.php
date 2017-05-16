<?php
	 
class StudentController {
	private $_db;
	private $_bloc;
	private $_term;
	private $_student;
	
	public function __construct($db) {
		$this->_db = $db;
		
		if (isset($_GET['viewStudent']) && $this->_db->existing_student_from_id($_GET['viewStudent'])) {
			$this->_student = $this->_db->select_student_from_id($_GET['viewStudent']);
		} else {
			$this->_student = unserialize($_SESSION['user']);
		}
		
		$this->_bloc = $this->_student->html_bloc();
	}
			
	public function run(){
		
		$attendances = [];
		
		// user must be a student
		if (empty ( $_SESSION ['authenticated'])) {
			header ( 'Location: index.php?action=login' );
			die ();
		}
		
		if (isset($_POST['formSeancesFilter'])) {
			$attendances = $this->formSeancesFilter();
		} else {
			$attendances = $this->_db->select_student_attendances($this->_student->html_student_id(),"not_specified","not_specified","not_specified");
		}
		
		$weeks_term1 = $this->_db->select_weeks_term(1);
		$weeks_term2 = $this->_db->select_weeks_term(2);
		
		$seanceTemplates = $this->_db->select_seance_templates_student($this->_student->html_student_id());
		
		$courses = $this->_db->select_courses_student($this->_student->html_student_id());

		require_once(PATH_VIEWS . "student.php");
	}	
	
	
	public function formSeancesFilter() {
		
		if (isset($_POST['inputWeekSelect']) && isset($_POST['inputUESelect']) && isset($_POST['inputPresenceSelect'])) {
			
			$student_id = $this->_student->html_student_id();
			$week = $_POST['inputWeekSelect'];
			$ue = $_POST['inputUESelect'];
			$attendance = $_POST['inputPresenceSelect'];
			
			return $this->_db->select_student_attendances($student_id, $ue, $attendance, $week);
		}
			
	}
	
}
