<?php
class SeanceTemplate {
	private $_seance_template_id;
	private $_name;
	private $_ue_name;
	private $_attendance_type;
	private $_series = "";
	public function __construct($_seance_template_id, $name,$ue_name, $attendance_type, $series) {
		$this->_seance_template_id = $_seance_template_id;
		$this->_name = $name;
		$this->_ue_name = $ue_name;
		$this->_attendance_type = $attendance_type;
		$this->_series = $series;
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
	public function html_ue_name() {
		return htmlspecialchars ( $this->_ue_name );
	}
	public function html_attendance_type() {
		return htmlspecialchars ( $this->_attendance_type );
	}
	public function html_seance_template_id() {
		return htmlspecialchars ( $this->_seance_template_id );
	}
	public function series() {
		return $this->_series;
	}
}