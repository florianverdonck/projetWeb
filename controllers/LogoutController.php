<?php
class LogoutController {
	public function __construct() {
	}
	public function run() {
		$_SESSION = array ();
		session_destroy ();
		header ( 'Location: index.php?user=login' );
	}
}
