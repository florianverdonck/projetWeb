<?php
class Week {
	private $_week_id;
	private $_week_number;
	private $_term;
	private $_monday_date;
	public function __construct($week_id, $week_number, $term, $monday_date) {
		$this->_week_id = $week_id;
		$this->_week_number = $week_number;
		$this->_term = $term;
		$this->_monday_date = $monday_date;
	}
	public function week_id() {
		return $this->_week_id;
	}
	public function week_number() {
		return $this->_week_number;
	}
	public function term() {
		return $this->_term;
	}
	public function monday_date() {
		return $this->_monday_date;
	}
	public function html_week_id() {
		return htmlspecialchars ( $this->_week_id );
	}
	public function html_week_number() {
		return htmlspecialchars ( $this->_week_number );
	}
	public function html_term() {
		return htmlspecialchars ( $this->_term );
	}
	public function html_monday_date() {
		return htmlspecialchars ( $this->_monday_date );
	}
}