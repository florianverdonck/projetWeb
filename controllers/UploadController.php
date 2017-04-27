<?php
	
// TO-DO PERMISSION CHECK

class UploadController {
	
	private $_db;
	
	public function __construct($db) {
		$_db = $db;
	}
			
	public function run(){	
		
		require_once(PATH_MODELS . 'CSVParser.php');
		
		$file_url = $_GET['file_url'];
		
		if ($_GET['file_desc'] == "UE") {
			
			$array_to_insert = CSVtoArray($file_url);
			
			print_r($array_to_insert);
			
			foreach ($array_to_insert as $key => $value) {
				
				echo $value;
				
				$table = explode(';', $value);
				
				$bloc = $_GET['bloc'];
				$name = $table[0];
				$code = $table[1];
				$term = $table[2];
				$course_unit_learning_activity = $table[3];
				$ects = $table[4];
				$abbreviation = $table[5];
				
				if ($key != 0) {
					var_dump($this->_db);
					$this->_db->insert_course($code, $name, $term, $ects, $bloc, $abbreviation = '', $course_unit_learning_activity);
			
				}
			}
			
		}
		
		
	}
	
}
