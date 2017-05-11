<?php
class GivenSeance {
	private $_given_seance_id;
	private $_seance_template_id;
	private $_serie_id;
	private $_name;
	private $_attendance_type;
	private $_code;
	private $_term;
	private $_bloc;
	public function __construct($given_seance_id, $seance_template_id, $serie_id, $name, $attendance_type, $code, $term, $bloc) {
		$this->_given_seance_id = $given_seance_id;
		$this->_seance_template_id = $seance_template_id;
		$this->_serie_id = $serie_id;
		$this->_name = $name;
		$this->_attendance_type = $attendance_type;
		$this->_code = $code;
		$this->_term = $term;
		$this->_bloc = $bloc;
	}
	public function given_seance_id() {
		return htmlspecialchars($this->_given_seance_id);
	}
	public function seance_template_id() {
		return htmlspecialchars($this->_seance_template_id);
	}
	public function serie_id() {
		return htmlspecialchars($this->_serie_id);
	}
	public function name() {
		return htmlspecialchars($this->_name);
	}
	public function attendance_type() {
		return htmlspecialchars($this->_attendance_type);
	}
	public function code() {
		return htmlspecialchars($this->_code);
	}
	public function term() {
		return htmlspecialchars($this->_term);
	}
	public function bloc() {
		return htmlspecialchars($this->_bloc);
	}
}