<?php
class Course {
	private $_code;
	private $_name;
	private $_term;
	private $_ECTs;
	private $_bloc;
	private $_abbreviation;
	private $_course_unit_learning_activity;
	public function __construct($code, $name, $term, $ECTs, $bloc, $abbreviation, $course_unit_learning_activity) {
		$this->_code = $code;
		$this->_name = $name;
		$this->_term = $term;
		$this->_ECTs = $ECTs;
		$this->_bloc = $bloc;
		$this->_abbreviation = $abbreviation;
		$this->_course_unit_learning_activity = $course_unit_learning_activity;
	}
	public function code() {
		return $this->_code;
	}
	public function name() {
		return $this->_name;
	}
	public function term() {
		return $this->_term;
	}
	public function ECTs() {
		return $this->_ECTs;
	}
	public function bloc() {
		return $this->_bloc;
	}
	public function abbreviation() {
		return $this->_abbreviation;
	}
	public function course_unit_learning_activity() {
		return $this->_course_unit_learning_activity;
	}
	public function html_code() {
		return htmlspecialchars ( $this->_code );
	}
	public function html_name() {
		return htmlspecialchars ( $this->_name );
	}
	public function html_term() {
		return htmlspecialchars ( $this->_term );
	}
	public function html_ECTs() {
		return htmlspecialchars ( $this->_ECTs );
	}
	public function html_bloc() {
		return htmlspecialchars ( $this->_bloc );
	}
	public function html_abbreviation() {
		return htmlspecialchars ( $this->_abbreviation );
	}
	public function html_course_unit_learning_activity() {
		return htmlspecialchars ( $this->_course_unit_learning_activity );
	}
}