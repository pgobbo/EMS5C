<?php 
	require_once('models/modelEdificio.php');
	class EdificioController {
		public static function show() {
			$edifici=Edifici::show();
			require_once('views/viewEdificio.php');
			
		}

		public static function addShow() {
			require_once('views/viewEdificioInsert.php');
		}

		public static function add() {
			Edifici::add($_GET['codice'], $_GET['nome'], $_GET['idIstituto']);
			self::show();
		}

		public static function delete() {
			Edifici::delete($_GET['IdEdificio']);
			unset($_GET);
			self::show();
		}

		public static function updateShow() {
			require_once('views/viewEdificioUpdate.php');
		}

		public static function update() {
			Edifici::update($_GET['IdEdificio'],$_GET['codice'],$_GET['nome'],$_GET['idIstituto']);
			self::show();
		}

		public static function error() {
			require_once('views/error.php');
		}
	}
?>