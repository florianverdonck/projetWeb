<?php

class BlocResponsibleController {
	private $_db;
	public function __construct($db) {
		$this->_db = $db;
	}
		
	public function run(){

		if (isset($_POST['formUEUpload'])) {
			$update_message = $this->formUE();
		}

		$action = (isset ( $_GET ['action'] )) ? htmlentities ( $_GET ['action'] ) : 'default';
		switch ($action) {
			case 'series':
				require_once(PATH_VIEWS . "bloc_responsible_series.php");
				break;
			case 'seance_templates':
				require_once(PATH_VIEWS . "bloc_responsible_seance_templates.php");
				break;
			default:
				require_once(PATH_VIEWS . "bloc_responsible.php");
				break;
		}

	}
	
	public function formUE() {
		
		if (!empty($_FILES['inputUEFile']['name'])) {
			if (!preg_match ( '/^programme_bloc' . $_POST['inputBloc'] . '.csv$/', $_FILES['inputUEFile']['name'])) {
				return Array(
						"error_code"=>"danger",
						"error_message"=>"Le fichier " . $_FILES['inputUEFile']['name'] . " ne dispose pas du bon format."
				);
			}
			$origine = $_FILES['inputUEFile']['tmp_name'];
			$destination = 'conf/programme_bloc' . $_POST['inputBloc'] . '.csv';
			move_uploaded_file($origine, $destination);
			return Array(
					"error_code"=>"success",
					"error_message"=>"Le nouveau fichier de programme du bloc " . $_POST['inputBloc'] . " a bien été pris en compte."
			);
		}
	}

}