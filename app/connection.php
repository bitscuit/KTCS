<?php
	// database connection set up.
	// uses singleton to ensure only one connection
	// TODO: change the connection to KTCS database
	class Db {
		private static $instance = NULL;

		private function __construct() {}

		private function __clone() {}

		public static function getInstance() {
			if (!isset(self::$instance)) {
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				self::$instance = new PDO("mysql:host=localhost;dbname=332", "root", "", $pdo_options);
			}
			return self::$instance;
		}
	}
?>
