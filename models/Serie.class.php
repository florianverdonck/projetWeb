<?php
class Serie {
	private $_serie_id;
	private $_term;
	private $_serie_numero;
	private $_bloc;
	public function __construct($serie_id, $term, $serie_numero, $bloc) {
		$this->_serie_id = $serie_id;
		$this->_term = $term;
		$this->_serie_numero = $serie_numero;
		$this->_bloc = $bloc;
	}
	
	public function serie_id() {
		return $this->_serie_id;
	}
	public function term() {
		return $this->_term;
	}
	public function serie_numero() {
		return $this->_serie_numero;
	}
	public function bloc() {
		return $this->_bloc;
	}
	public function html_serie_id() {
		return htmlspecialchars ( $this->_serie_id );
	}
	public function html_term() {
		return htmlspecialchars ( $this->_term );
	}
	public function html_serie_numero() {
		return htmlspecialchars ( $this->_serie_numero );
	}
	public function html_bloc() {
		return htmlspecialchars ( $this->_bloc );
	}
}