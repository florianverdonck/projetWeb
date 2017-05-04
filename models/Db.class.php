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
	
	public function select_students(){
		$query = 'SELECT * FROM students ORDER BY name';
		$ps = $this->_db->prepare ( $query );
		$ps->execute ();
		$array_students = "";
		while ( $row = $ps->fetch () ) {
			$array_students [] = new Student ( $row->mail, $row->name, $row->first_name, $row->bloc );
		}
		return $array_students;
	}
	
	public function select_students_bloc($bloc){
		$query = 'SELECT * FROM students WHERE bloc = :bloc ORDER BY name';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue(':bloc', $bloc);
		$ps->execute ();
		$array_students = "";
		while ( $row = $ps->fetch () ) {
			$array_students [] = new Student ( $row->mail, $row->name, $row->first_name, $row->bloc );
		}
		return $array_students;
	}
	
	public function select_students_serie_bloc($serie, $bloc){
		$query = 'SELECT * FROM students WHERE bloc = : AND serie = :serie ORDER BY name';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue(':bloc', $bloc);
		$ps->bindValue(':serie', $serie);
		$ps->execute ();
		$array_students = "";
		while ( $row = $ps->fetch () ) {
			$array_students [] = new Student ( $row->mail, $row->name, $row->first_name, $row->bloc );
		}
		return $array_students;
	}
	
	public function select_series_from_bloc($bloc) {
		$query = 'SELECT * FROM series WHERE bloc = :bloc ORDER BY serie_numero';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue(':bloc', $bloc);
		$ps->execute ();
		$array_series = "";
		while ( $row = $ps->fetch () ) {
			$array_series[] = new Serie ( $row->serie_id, $row->term, $row->serie_numero, $row->bloc );
		}
		return $array_series;
	}
	
	public function select_series_from_bloc_term($bloc, $term) {
		$query = 'SELECT * FROM series WHERE bloc = :bloc AND term = :term ORDER BY serie_numero';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue(':bloc', $bloc);
		$ps->bindValue(':term', $term);
		$ps->execute ();
		$array_series = "";
		while ( $row = $ps->fetch () ) {
			$array_series[] = new Serie ( $row->serie_id, $row->term, $row->serie_numero, $row->bloc );
		}
		return $array_series;
	}
	
	public function select_number_series_from_bloc($bloc) {
		$query = 'SELECT COUNT(serie_id) AS numberSeries FROM series WHERE bloc = :bloc ORDER BY serie_numero';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue(':bloc', $bloc);
		$ps->execute ();
		$numberSeries = $ps->fetch();
		return $numberSeries;
	}	
	
	public function select_students_not_in_series_from_bloc($bloc) {
		$query = 'SELECT * FROM students WHERE serie_id IS NULL AND bloc = :bloc ORDER BY name';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue(':bloc', $bloc);
		$ps->execute ();
		$array_students = "";
		while ( $row = $ps->fetch () ) {
			$array_students [] = new Student ( $row->mail, $row->name, $row->first_name, $row->bloc );
		}
		return $array_students;
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
	public function select_professor($mail) {
		$query = 'SELECT mail, name, first_name, responsible FROM professors
				WHERE mail = :mail';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue ( ':mail', $mail );
		$ps->execute ();
		$row = $ps->fetch ();
		$professor = '';
		if (!empty($row)) {
			$professor = new Professor ( $row->mail, $row->name, $row->first_name, $row->responsible );
		}
		return $professor;
	}
	
	public function select_student($mail) {
		$query = 'SELECT mail, name, first_name, bloc FROM students
				WHERE mail = :mail';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue ( ':mail', $mail );
		$ps->execute ();
		$row = $ps->fetch ();
		$student = '';
		if (!empty($row)) {
			$student = new Student ( $row->mail, $row->name, $row->first_name, $row->bloc );
		}
		return $student;
	}
	
	public function select_seance_templates($bloc, $term) {
		$query = 'SELECT DISTINCT st.name, st.attendance_type FROM seance_templates st, courses c
				WHERE st.code = c.code AND c.term = :term AND c.bloc = :bloc';
		$ps = $this->_db->prepare($query);
		$ps->bindValue(':bloc', $bloc);
		$ps->bindValue(':term', $term);
		$ps->execute();
		$array_seance_template = '';
		while ( $row = $ps->fetch () ) {
			$array_seance_template [] = new seance_template ($row->name, $row->attendance_type);
		}
		return $array_seance_template;
	}
	

	// check if a professor is already inserted
	public function existing_professor($mail) {
		$query = 'SELECT mail from professors WHERE mail = :mail';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue ( ':mail', $mail );
		$ps->execute ();
		return $ps->rowcount () == 1;
	}
	
	
	public function existing_course($code) {
		$query = 'SELECT code from courses WHERE code = :code';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue ( ':code', $code);
		$ps->execute ();
		return $ps->rowcount () == 1;
	}
	
	public function existing_student($mail) {
		$query = 'SELECT mail from students WHERE mail = :mail';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue ( ':mail', $mail );
		$ps->execute ();
		return $ps->rowcount () == 1;
	}
	
	// check if agenda is created 
	public function existing_weeks() {
		$query = 'SELECT * from weeks';
		$ps = $this->_db->prepare ( $query );
		$ps->execute ();
		return $ps->rowcount () > 0;
	}
	
	// check if seances are created
	public function existing_seances() {
		$query = 'SELECT * from seance_templates';
		$ps = $this->_db->prepare ( $query );
		$ps->execute ();
		return $ps->rowcount () > 0;
	}
}
?>