<?php

class Db {
	
	private static $instance = null;
	private $_db;
	
	private function __construct() {
		
		require_once(PATH_MODELS . "DbLogins.php");
		
		try {
			$this->_db = new PDO ($DbHost, $DbUser, $DbPassword);
			$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->_db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		} catch(PDOException $e){
			die('Database connection failure : ' . $e->getMessage ());
		}
	}
	public static function getInstance() {
		if (is_null(self::$instance)) {
			self::$instance = new Db ();
		}
		return self::$instance;
	}
	public function insert_week($week_number, $term, $monday_date) {
		$query = 'INSERT INTO weeks (week_number, term, monday_date) 
				VALUES (:week_number, :term, :monday_date)';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue (':week_number', $week_number);
		$ps->bindValue (':term', $term);
		$ps->bindValue (':monday_date', $monday_date);
		return $ps->execute ();
	}
	public function insert_professor($mail, $name, $first_name, $responsible) {
		$query = 'INSERT INTO professors (mail, name, first_name, responsible) 
				VALUES (:mail, :name, :first_name, :responsible)';
		$ps = $this->_db->prepare($query);
		$ps->bindValue(':mail', $mail);
		$ps->bindValue('name', $name);
		$ps->bindValue(':first_name', $first_name);
		$ps->bindValue(':responsible', $responsible);
		return $ps->execute ();
	}
	public function insert_course($code, $name, $term, $ECTs, $bloc, $abbreviation, $course_unit_learning_activity) {
		if ($abbreviation = ! '') {
			$query = 'INSERT INTO courses (code, name, term, ECTs, bloc, abbreviation, course_unit_learning_activity)
				VALUES (:code, :name, :term, :ECTs, :bloc, :abbreviation, :course_unit_learning_activity)';
			$ps = $this->_db->prepare($query);
			$ps->bindValue(':abbreviation', $abbreviation);
		} else {
			$query = 'INSERT INTO courses (code, name, term, ECTs, bloc, course_unit_learning_activity)
				VALUES (:code, :name, :term, :ECTs, :bloc, :course_unit_learning_activity)';
			$ps = $this->_db->prepare($query);
		}
		$ps->bindValue(':code', $code);
		$ps->bindValue(':name', $name);
		$ps->bindValue(':term', $term);
		$ps->bindValue(':ECTs', $ECTs);
		$ps->bindValue(':bloc', $bloc);
		$ps->bindValue(':course_unit_learning_activity', $course_unit_learning_activity);
		return $ps->execute ();
	}
	public function insert_serie($term, $bloc, $serie_numero) {
		$query = 'INSERT INTO series (term, bloc, serie_numero) VALUES (:term, :bloc, :serie_numero)';
		$ps = $this->_db->prepare($query);
		$ps->bindValue(':term', $term);
		$ps->bindValue(':bloc', $bloc);
		$ps->bindValue(':serie_numero', $serie_numero);
		return $ps->execute ();
	}
	public function insert_student($mail, $bloc, $name, $first_name) { 
		$query = 'INSERT INTO students (mail, bloc, name, first_name)
				VALUES (:mail, :bloc, :name, :first_name)';
		$ps = $this->_db->prepare($query);
		$ps->bindValue(':mail', $mail);
		$ps->bindValue(':bloc', $bloc);
		$ps->bindValue(':name', $name);
		$ps->bindValue(':first_name', $first_name);
		return $ps->execute();
	}
	public function insert_seance_template($name, $attendance_type, $code){
		$query = 'INSERT INTO seance_templates (name, attendance_type, code)
				VALUES (:name, :attendance_type, :code)';
		$ps = $this->_db->prepare($query);
		$ps->bindValue(':name', $name);
		$ps->bindValue(':attendance_type', $attendance_type);
		$ps->bindValue(':code', $code);
		return $ps->execute();
	}
	public function select_professors(){
		$query = 'SELECT mail, name, first_name, responsible FROM professors';
		$ps = $this->_db->prepare ( $query );
		$ps->execute ();
		$array_professors = "";
		while ( $row = $ps->fetch () ) {
			$array_professors [] = new Professor ( $row->mail, $row->name, $row->first_name, $row->responsible );
		}
		return $array_professors;
	}
	public function select_weeks(){
		$query = 'SELECT week_id, week_number, term, monday_date FROM weeks';
		$ps = $this->_db->prepare ( $query );
		$ps->execute ();
		$array_weeks = "";
		while ( $row = $ps->fetch () ) {
			$array_weeks [] = new Week ( $row->week_id, $row->week_number, $row->term, $row->monday_date );
		}
		return $array_weeks;
	}
	// check if a professor is already inserted
	public function existing_professor($mail) {
		$query = 'SELECT mail from professors WHERE mail = :mail';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue ( ':mail', $mail );
		$ps->execute ();
		return $ps->rowcount () == 1;
	}
}


?>