<?php
class Db {
	private static $instance = null;
	private $_db;
	private function __construct() {
		try {
			$this->_db = new PDO ( 'mysql:root=localhost;dbname=attendances;charset=utf8', 'root', '' );
			$this->_db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$this->_db->setAttribute ( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );
		} catch ( PDOException $e ) {
			die ( 'Database connection failure : ' . $e->getMessage () );
		}
	}
	public static function getInstance() {
		if (is_null ( self::$instance )) {
			self::$instance = new Db ();
		}
		return self::$instance;
	}
}
?>