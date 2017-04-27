<?php

	// This function is used to convert CSV input file into standard PHP Array
	// First row always contains headers, could be useful for next steps as insert/updates into DB Tables
	
		
	function CSVtoArray($csv_location) {

		$csv = array_map('str_getcsv', file($csv_location));
	
		$output = Array();
	
		foreach ($csv as $key => $value) {
		    $output[] = $value[0];
		}
	
		return $output;
			
	}
	
	//echo "<pre>";
	//print_r(CSVtoArray("programme_bloc3.csv"));
	//echo "</pre>";
	
?>