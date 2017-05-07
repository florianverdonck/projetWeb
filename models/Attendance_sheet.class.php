<?php
class Attendance_sheet {
	private $_attendance_sheet_id;
	private $_seance_template_id;
	private $_mail;
	private $_week_id;
	public function __construct($attendance_sheet_id, $seance_template_id, $mail, $week_id) {
		$this->_attendance_sheet_id = $attendance_sheet_id;
		$this->_seance_template_id = $seance_template_id;
		$this->_mail = $mail;
		$this->_week_id = $week_id;
	}
	public function attendance_sheet_id() {
		return $this->_attendance_sheet_id;
	}
	public function seance_template_id() {
		return $this->_seance_template_id;
	}
	public function mail() {
		return $this->_mail;
	}
	public function week_id() {
		return $this->_week_id;
	}
	public function html_attendance_sheet_id() {
		return htmlspecialchars ( $this->_attendance_sheet_id );
	}
	public function html_seance_template_id() {
		return htmlspecialchars ( $this->_seance_template_id );
	}
	public function html_mail() {
		return htmlspecialchars ( $this->_mail );
	}
	public function html_week_id() {
		return htmlspecialchars ( $this->_week_id );
	}
}