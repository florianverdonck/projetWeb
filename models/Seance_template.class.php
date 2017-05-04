<?php
class Seance_template {
	private $_name;
	private $_attendance_type;
	private $_responsible;
	public function __construct($name, $attendance_type, $responsible) {
		$this->_name = $name;
		$this->_attendance_type = $attendance_type;
		$this->_responsible = $responsible;
	}
	public function name() {
		return $this->_name;
	}
	public function attendance_type() {
		return $this->_attendance_type;
	}
	public function html_name() {
		return htmlspecialchars ( $this->_name );
	}
	public function html_attendance_type() {
		return htmlspecialchars ( $this->_attendance_type );
	}
}