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
	
	public function insert_attendance_sheet($seance_template_id, $mail, $week_id) {
		$query = 'INSERT INTO attendance_sheets (seance_template_id, mail, week_id)
				VALUES (:seance_template_id, :mail, :week_id)';
		$ps = $this->_db->prepare($query);
		$ps->bindValue(':seance_template_id', $seance_template_id);
		$ps->bindValue(':mail', $mail);
		$ps->bindValue(':week_id', $week_id);
		return $ps->execute();
	}
	
	public function insert_attendance($attendance_sheet_id, $student_id, $attendance) {
		$query = 'INSERT INTO attendances (attendance_sheet_id, student_id, attendance)
				VALUES (:attendance_sheet_id, :student_id, :attendance)';
		$ps = $this->_db->prepare($query);
		$ps->bindValue(':attendance_sheet_id', $attendance_sheet_id);
		$ps->bindValue(':student_id', $student_id);
		$ps->bindValue(':attendance', $attendance);
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
			$array_students [] = new Student ( $row->student_id, $row->mail, $row->name, $row->first_name, $row->bloc );
		}
		return $array_students;
	}
	
	public function count_students($bloc){
		$query = 'SELECT count(*) AS numberStudents FROM students WHERE bloc = :bloc';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue(':bloc', $bloc);
		$ps->execute ();
		return $ps->fetch()->numberStudents;
	}
	
	public function select_students_bloc($bloc){
		$query = 'SELECT * FROM students WHERE bloc = :bloc ORDER BY name';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue(':bloc', $bloc);
		$ps->execute ();
		$array_students = "";
		while ( $row = $ps->fetch () ) {
			$array_students [] = new Student ( $row->student_id, $row->mail, $row->name, $row->first_name, $row->bloc );
		}
		return $array_students;
	}
	
	public function select_students_serie_bloc($serie, $bloc, $term){
		$query = 'SELECT * FROM students stu, series ser WHERE stu.serie_id = ser.serie_id AND stu.bloc = :bloc AND ser.serie_numero = :serie AND term = :term ORDER BY name';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue(':bloc', $bloc);
		$ps->bindValue(':term', $term);
		$ps->bindValue(':serie', $serie);
		$ps->execute ();
		$array_students = "";
		while ( $row = $ps->fetch () ) {
			$array_students [] = new Student ( $row->student_id, $row->mail, $row->name, $row->first_name, $row->bloc );
		}
		return $array_students;
	}
	
	public function select_students_serie_id($serie_id){
		$query = 'SELECT * FROM students stu, series ser WHERE stu.serie_id = ser.serie_id AND ser.serie_id = :serie_id ORDER BY name';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue(':serie_id', $serie_id);
		$ps->execute();
		$array_students = "";
		while ($row = $ps->fetch () ) {
			$array_students[] = new Student ( $row->student_id, $row->mail, $row->name, $row->first_name, $row->bloc );
		}
		return $array_students;
	}
	
	public function select_series_from_bloc($bloc, $term) {
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
	
	public function select_number_series_from_bloc($bloc, $term) {
		$query = 'SELECT COUNT(serie_id) AS numberSeries FROM series WHERE bloc = :bloc AND term = :term ORDER BY serie_numero';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue(':bloc', $bloc);
		$ps->bindValue(':term', $term);
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
			$array_students [] = new Student ( $row->student_id, $row->mail, $row->name, $row->first_name, $row->bloc );
		}
		return $array_students;
	}
	
	public function select_students_from_course ($seance_template_id, $serie_id) {
		$query = 'SELECT stu.* FROM students stu, seance_templates st, given_seances gs, series se
				WHERE stu.serie_id = se.serie_id AND gs.serie_id = se.serie_id AND gs.seance_template_id = st.seance_template_id
				AND st.seance_template_id = :seance_template_id AND se.serie_id = :serie_id
				ORDER BY stu.name';
		$ps = $this->_db->prepare($query);
		$ps->bindValue(':seance_template_id', $seance_template_id);
		$ps->bindValue(':serie_id', $serie_id);
		$ps->execute();
		$array_students = "";
		while ( $row = $ps->fetch () ) {
			$array_students [] = new Student ( $row->student_id, $row->mail, $row->name, $row->first_name, $row->bloc );
		}
		var_dump($array_students);
		return $array_students;
	}	
	
	public function select_students_from_attendances($attendance_sheet_id) {
		$query = 'SELECT stu.*, at.attendance FROM students stu, attendances at
				WHERE at.student_id = stu.student_id AND at.attendance_sheet_id = :attendance_sheet_id ORDER BY name';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue ( ':attendance_sheet_id', $attendance_sheet_id );
		$ps->execute ();
		$array_students = '';
		while ( $row = $ps->fetch () ) {
			$array_students [] = new Student ( $row->student_id, $row->mail, $row->name, $row->first_name, $row->bloc, $row->attendance );
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
	
	public function select_seance_templates($bloc, $term) {
		$query = 'SELECT st.* FROM seance_templates st, courses c
				WHERE st.code = c.code AND c.term = :term AND c.bloc = :bloc';
		$ps = $this->_db->prepare($query);
		$ps->bindValue(':bloc', $bloc);
		$ps->bindValue(':term', $term);
		$ps->execute();
		$array_seance_template = '';
		while ( $row = $ps->fetch () ) {
			$array_seance_template [] = new seance_template ($row-> seance_template_id, $row->name, $row->attendance_type);
		}
		return $array_seance_template;
	}
	
	public function select_weeks_term($term){
		$query = 'SELECT * FROM weeks WHERE term = :term';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue(':term', $term);
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
		$query = 'SELECT * FROM students
				WHERE mail = :mail';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue ( ':mail', $mail );
		$ps->execute ();
		$row = $ps->fetch ();
		$student = '';
		if (!empty($row)) {
			$student = new Student ( $row->student_id, $row->mail, $row->name, $row->first_name, $row->bloc );
		}
		return $student;
	}
	
	public function select_week($week_number, $term) {
		$query = 'SELECT * FROM weeks
				WHERE week_number = :week_number AND term = :term';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue ( ':week_number', $week_number );
		$ps->bindValue ( ':term', $term );
		$ps->execute ();
		$row = $ps->fetch ();
		$week = '';
		if (!empty($row)) {
			$week = new Week ( $row->week_id, $row->week_number, $row->term, $row->monday_date );
		}
		return $week;
	}
	
	public function select_attendance_sheet($seance_template_id, $week_id) {
		$query = 'SELECT * FROM attendance_sheets 
				WHERE seance_template_id = :seance_template_id AND week_id = :week_id';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue ( ':seance_template_id', $seance_template_id );
		$ps->bindValue ( ':week_id', $week_id );
		$ps->execute ();
		$row = $ps->fetch ();
		$attendance_sheet = '';
		if (! empty ( $row )) {
			$attendance_sheet = new Attendance_sheet ( $row->attendance_sheet_id, $row->seance_template_id, $row->mail, $row->week_id );
		}
		return $attendance_sheet;
	}
	
	public function select_attendance($attendance_sheet_id, $student_id) {
		$query = 'SELECT * from attendances WHERE attendance_sheet_id = :attendance_sheet_id AND student_id = :student_id';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue ( ':attendance_sheet_id', $attendance_sheet_id );
		$ps->bindValue ( ':student_id', $student_id );
		$row = $ps->fetch ();
		$attendance = '';
		if (! empty ( $row )) {
			$attendance = new Attendance ( $row->attendance_id, $row->attendance_sheet_id, $row->student_id, $row->attendance, $row->sick_note );
		}
		return $attendance;
	}
	
	public function select_attendance_type ($seance_template_id) {
		$query = 'SELECT attendance_type FROM seance_templates WHERE seance_template_id = :seance_template_id';
		$ps = $this->_db->prepare($query);
		$ps->bindValue(':seance_template_id', $seance_template_id);
		$ps->execute();
		$row = $ps->fetch ();	
		$attendance_type = $row->attendance_type;
		return $attendance_type;
	}
	
	// check if a professor is already inserted
	public function existing_professor($mail) {
		$query = 'SELECT mail FROM professors WHERE mail = :mail';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue ( ':mail', $mail );
		$ps->execute ();
		return $ps->rowcount () == 1;
	}
	
	public function existing_course($code) {
		$query = 'SELECT code FROM courses WHERE code = :code';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue ( ':code', $code);
		$ps->execute ();
		return $ps->rowcount () == 1;
	}
	
	public function existing_student($mail) {
		$query = 'SELECT mail FROM students WHERE mail = :mail';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue ( ':mail', $mail );
		$ps->execute ();
		return $ps->rowcount () == 1;
	}
	
	public function existing_series($bloc, $term) {
		$query = 'SELECT * from series WHERE bloc = :bloc AND term = :term';
		$ps = $this->_db->prepare ( $query );
		$ps->bindValue(':bloc', $bloc);
		$ps->bindValue(':term', $term);
		$ps->execute ();
		return $ps->rowcount () == 1;
	}
	
	// check if agenda is created 
	public function existing_weeks() {
		$query = 'SELECT * FROM weeks';
		$ps = $this->_db->prepare ( $query );
		$ps->execute ();
		return $ps->rowcount () > 0;
	}
	
	// check if seances are created
	public function existing_seances() {
		$query = 'SELECT * FROM seance_templates';
		$ps = $this->_db->prepare ( $query );
		$ps->execute ();
		return $ps->rowcount () > 0;
	}
		
	public function update_student_serie($mail, $serie_id) {
		$query = 'UPDATE students SET serie_id = :serie_id WHERE mail = :mail';
		$ps = $this->_db->prepare( $query );
		$ps->bindValue ( ':serie_id', $serie_id );
		$ps->bindValue ( ':mail', $mail );
		$ps->execute ();
		return true;
	}
	
	public function update_student_serie_delete($mail) {
		$query = 'UPDATE students SET serie_id = NULL WHERE mail = :mail';
		$ps = $this->_db->prepare( $query );
		$ps->bindValue ( ':mail', $mail );
		$ps->execute ();
		return true;
	}
	
	
	public function existing_attendance_sheet($seance_template_id, $week_id) {
		$query = 'SELECT * FROM attendance_sheets 
				WHERE seance_template_id = :seance_template_id AND week_id = :week_id';
		$ps = $this->_db->prepare($query);
		$ps->bindValue(':seance_template_id', $seance_template_id);
		$ps->bindValue(':week_id', $week_id);
		$ps->execute ();
		return $ps->rowcount () > 0;
	}
	
	public function existing_attendance ($attendance_sheet_id, $student_id) {
		$query = 'SELECT * FROM attendances
			WHERE attendance_sheet_id = :attendance_sheet_id AND student_id = :student_id';
		$ps = $this->_db->prepare($query);
		$ps->bindValue(':attendance_sheet_id', $attendance_sheet_id);
		$ps->bindValue(':student_id', $student_id);
		$ps->execute ();
		return $ps->rowcount () > 0;
	}
	
	public function update_attendance ($attendance_sheet_id, $student_id, $attendance) {
		$query = 'UPDATE attendances SET attendance = :attendance 
				WHERE attendance_sheet_id = :attendance_sheet_id AND student_id = :student_id';
		$ps = $this->_db->prepare($query);
		$ps->bindValue(':attendance', $attendance);
		$ps->bindValue(':attendance_sheet_id', $attendance_sheet_id);
		$ps->bindValue(':student_id', $student_id);
		$ps->execute ();
	}
}
?>