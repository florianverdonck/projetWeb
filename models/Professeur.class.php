<?php
class Professor {
	private $_mail;
	private $_name;
	private $_first_name;
	private $_responsible;
	public function __construct($mail, $name, $first_name, $responsible) {
		$this->_mail = $mail;
		$this->_name = $name;
		$this->_first_name = $first_name;
		$this->_responsible = $responsible;
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
	public function responsible() {
		return $this->_responsible;
	}
	public function html_mail() {
		return htmlspecialchars ($this->_mail);
	}
	public function html_name() {
		return htmlspecialchars ($this->_name);
	}
	public function html_first_name() {
		return htmlspecialchars($this->_first_name);
	}
	public function html_responsible() {
		return htmlspecialchars($this->_responsible);
	}	
}
?>