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
	public function insert_course($code, $name, $term, $ETCs, $bloc, $abbreviation = '', $course_unit_learning_activity) {
		if ($abbreviation = ! '') {
			$query = 'INSERT INTO courses (code, name, term, ETCs, bloc, abbreviation, course_unit_learning_activity)
				VALUES (:code, :name, :term, :ETCs:, :bloc, :abbreviation, :course_unit_learning_activity)';
			$ps = $this->_db->prepare($query);
			$ps->bindValue(':abbreviation', $abbreviation);
		} else {
			$query = 'INSERT INTO courses (code, name, term, ETCs, bloc, course_unit_learning_activity)
				VALUES (:code, :name, :term, :ETCs:, :bloc, :course_unit_learning_activity)';
			$ps = $this->_db->prepare($query);
		}
		$ps->bindValue(':code', $code);
		$ps->bindValue(':name', $name);
		$ps->bindValue(':ECTS', $ECTs);
		$ps->bindValue(':bloc', $bloc);
		$ps->bindValue(':course_unit_learning_activity', $course_unit_learning_activity);
		return $ps->execute ();
	}
	public function insert_serie($term, $serie_name) {
		$query = 'INSERT INTO series (term, serie_name) VALUES (:term, :serie_name)';
		$ps = $this->_db->prepare($query);
		$ps->bindValue(':term', $term);
		$ps->bindValue(':serie_name', $serie_name);
		return $ps->execute ();
	}
	public function insert_student($mail, $bloc, $name, $first_name) { 
		$query = 'INSERT INTO students (mail, bloc, name, first_name)
				VALUES (:mail, :bloc, :name, :first_name, :serie_id)';
		$ps = $this->_db->prepare($query);
		$ps->bindValue(':mail', $mail);
		$ps->bindValue(':bloc', $bloc);
		$ps->bindValue(':name', $name);
		$ps->bindValue(':first_name', $first_name);
		return $ps->execute();
	}
	public function select_professors(){
		$query = 'SELECT mail, name, first_name, responsible FROM professors';
		$ps = $this->_db->prepare ( $query );
		$ps->execute ();
		while ( $row = $ps->fetch () ) {
			$array_professors [] = new Professor ( $row->mail, $row->pseudo, $row->photo );
		}
		return $array_professors;
	}
}


?>