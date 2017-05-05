<?php
class Student {
	private $_student_id;
	private $_mail;
	private $_name;
	private $_first_name;
	private $_bloc;
	public function __construct($student_id, $mail, $name, $first_name, $bloc) {
		$this->_student_id = $student_id;
		$this->_mail =       $mail;
		$this->_name =       $name;
		$this->_first_name = $first_name;
		$this->_bloc =       $bloc;
	}
	public function student_id() {
		return $this->_student_id;
	}
	public function mail() {
		return $this->_mail;
	}
	public function name() {
		return $this->_name;
	}
	public function first_name() {
		return $this->_first_name;
	}
	public function bloc() {
		return $this->_bloc;
	}
	public function html_student_id() {
		return htmlspecialchars ( $this->_student_id );
	}
	public function html_mail() {
		return htmlspecialchars ( $this->_mail );
	}
	public function html_name() {
		return htmlspecialchars ( $this->_name );
	}
	public function html_first_name() {
		return htmlspecialchars ( $this->_first_name );
	}
	public function html_bloc() {
		return htmlspecialchars ( $this->_bloc );
	}
}