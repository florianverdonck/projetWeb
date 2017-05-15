<?php
class Attendance {
	private $_attendance_id;
	private $_attendance_sheet_id;
	private $_student_id;
	private $_attendance;
	private $_sick_note;
	private $_seance_template_name;
	private $_week_number;
	public function __construct($attendance_id, $attendance_sheet_id, $student_id, $attendance, $sick_note, $seance_template_name="", $week_number="") {
		$this->_attendance_id = $attendance_id;
		$this->_attendance_sheet_id = $attendance_sheet_id;
		$this->_student_id = $student_id;
		$this->_attendance = $attendance;
		$this->_sick_note = $sick_note;
		$this->_seance_template_name = $seance_template_name;
		$this->_week_number = $week_number;
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
	public function html_seance_template_name() {
		return htmlspecialchars ( $this->_seance_template_name );
	}
	public function html_week_number() {
		return htmlspecialchars ( $this->_week_number );
	}
}