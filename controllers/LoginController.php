<?php

class LoginController {
	private $_db;
	public function __construct($db) {
		$this->_db = $db;
	}
		
	public function run(){
		// checks if the user is already logged in
		if (! empty ( $_SESSION ['authenticated'] )) {
			$this->checkPermissions ();
		}
		$update_message = '';
		if (! empty ( $_POST ['form_login'] )) {
			$update_message = $this->formLogin ();
		}
		require_once(PATH_VIEWS . "login.php");
	}

	// redirects according to permissions
	private function checkPermissions() {
		$user = $_SESSION ['authenticated'];
		header ( "Location: index.php?user=$user" );
		die ();
	}

	private function formLogin() {
		$mail = $_POST ['inputEmail'];
		// checks if input is empty
		if ($mail == null ) {
			return $this->connectionErrorMessage ( );
		}
		if (preg_match('/@student\.vinci\.be$/', $mail)) { // is a student
			$student = $this->_db->select_student($mail);				
			if (empty($student)) { // student doesn't exist
				return $this->connectionErrorMessage ( );
			}
			$this->setAuthentificationStudent ($student);
		}
		
		if (preg_match('/@vinci\.be$/', $mail) || preg_match('/@ipl\.be$/', $mail)) { // is a professor
			$professor = $this->_db->select_professor($mail);
			if (empty($professor)) { // professor doesn't exist
				return $this->connectionErrorMessage ( );
			}
			$this->setAuthenficationProfessor ($professor);
		}
		return $this->connectionErrorMessage ();
	}

	private function setAuthentificationStudent($student) {
		$_SESSION ['authenticated'] = 'student';
		$_SESSION['user'] = serialize($student);
		header ( 'Location: index.php?action=student' );
		die ();
	}

	private function setAuthenficationProfessor($professor){
		$responsible = $professor->responsible();		
		$_SESSION['user'] = serialize($professor);
		switch ($responsible) {
			case 'true':
				$_SESSION ['authenticated'] = 'admin';
				header ( 'Location: index.php?user=admin' );
				die ();
			case 'false':
				$_SESSION ['authenticated'] = 'professor';
				header ( 'Location: index.php?user=professor' );
				die ();
			case 'blocs':
				$_SESSION ['authenticated'] = 'blocs_responsible';
				header ( 'Location: index.php?user=blocs_responsible' );
				die ();
			default:
				$_SESSION ['authenticated'] = 'bloc_responsible';
				header ( 'Location: index.php?user=bloc_responsible' );
				die ();		
		}
	}

	private function connectionErrorMessage () {
		return array (
				"error_code" => "danger",
				"error_message" => "La connexion a échoué. Veuillez vérifier l'adresse mail."
		);
	}
}