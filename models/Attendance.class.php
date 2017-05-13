<?php
class Attendance {
	private $_attendance_id;
	private $_attendance_sheet_id;
	private $_student_id;
	private $_attendance;
	private $_sick_note;
	private $_course_name;
	private $_seance_template_name;
	private $_week_number;
	public function __construct($attendance_id, $attendance_sheet_id, $student_id, $attendance, $sick_note, $course_name="", $seance_template_name="", $week_number="") {
		$this->_attendance_id = $attendance_id;
		$this->_attendance_sheet_id = $attendance_sheet_id;
		$this->_student_id = $student_id;
		$this->_attendance = $attendance;
		$this->_sick_note = $sick_note;
	}
	public function attendance_id() {
		return $this->_attendance_id;
	}
	public function attendance_sheet_id() {
		return $this->_attendance_sheet_id;
	}
	public function student_id() {
		return $this->_student_id;
	}
	public function attendance() {
		return $this->_attendance;
	}
	public function sick_note() {
		return $this->_sick_note;
	}
	public function course_name() {
		return $this->_course_name;
	}
	public function seance_template_name() {
		return $this->_seance_template_name;
	}
	public function html_attendance_id() {
		return htmlspecialchars ( $this->_attendance_id );
	}
	public function html_attendance_sheet_id() {
		return htmlspecialchars ( $this->_attendance_sheet_id );
	}
	public function html_student_id() {
		return htmlspecialchars ( $this->_student_id );
	}
	public function html_attendance() {
		return htmlspecialchars ( $this->_attendance );
	}
	public function html_sick_note() {
		return htmlspecialchars ( $this->_sick_note );
	}
	public function html_course_name() {
		return htmlspecialchars ( $this->_course_name );
	}
	public function html_seance_template_name() {
		return htmlspecialchars ( $this->_seance_template_name );
	}
}