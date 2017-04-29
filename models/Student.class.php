<?php
class Student {
	private $_mail;
	private $_name;
	private $_first_name;
	private $_bloc;
	public function __construct($mail, $name, $first_name, $bloc) {
		$this->_mail = $mail;
		$this->_name = $name;
		$this->_first_name = $first_name;
		$this->_bloc = $bloc;
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
		return $this->bloc;
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
		return htmlspecialchars ( $this->bloc );
	}
}