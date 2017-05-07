<?php
class Seance_template {
	private $_seance_template_id;
	private $_name;
	private $_attendance_type;
	public function __construct($_seance_template_id, $name, $attendance_type) {
		$this->_seance_template_id = $_seance_template_id;
		$this->_name = $name;
		$this->_attendance_type = $attendance_type;
	}
	public function name() {
		return $this->_name;
	}
	public function attendance_type() {
		return $this->_attendance_type;
	}
	public function seance_template_id() {
		return $this->_seance_template_id;
	}
	public function html_name() {
		return htmlspecialchars ( $this->_name );
	}
	public function html_attendance_type() {
		return htmlspecialchars ( $this->_attendance_type );
	}
	public function html_seance_template_id() {
		return htmlspecialchars ( $this->_seance_template_id );
	}
}