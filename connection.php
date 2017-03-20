<?php 
	class Connection {

		private static $instance = NULL;

		private function __construct() {}
		private function __clone() {}

		public static function getConnection() {
			if(!isset(self::$instance)) {
				self::$instance = new PDO('mysql:host=192.168.2.5;dbname=ems', '5cin', '5cin');
			}
			return self::$instance;
		}
	}
?>