<?php

  class controllerClassi{

  	public function visualizzaModifica(){
		require_once('views/viewClassiModifica.php');
	}

	public function visualizzaHome(){
		require_once('views/viewClassiHome.php');
	}

	public function visualizzaCancella(){
		require_once('views/viewClassiCancella.php');
	}

	public function visualizzaInserisci(){
		require_once('views/viewClassiInserisci.php');
	}

	public function inserisci(){

		require_once('/../models/modelClassi.php');
		
		$classe = new Classe("",$_POST['Codice'], $_POST['Nome']);
		Classi::insert($classe);

		echo "<div class='alert alert-success' role='alert'>
			  <a href='index.php?controller=Classi&action=visualizzaHome' class='alert-link'>Inserimento eseguito con successo!</a>
			</div>";

	}

	public static function cerca(){
		require_once('/../models/modelClassi.php');
		
		$classi = Classi::getArrayQuery($_POST['Id'], $_POST['Codice'], $_POST['Nome']);

		require_once('views/viewClassiTable.php');

	}

	public function cancella(){
		require_once('/../models/modelClassi.php');

		Classi::delete($_POST['Id']);

		echo "<div class='alert alert-success' role='alert'>
			  <a href='index.php?controller=Classi&action=visualizzaHome' class='alert-link'>Eliminazione eseguita con successo!</a>
			</div>";
	}

	public function modifica(){

		require_once('/../models/modelClassi.php');
		
		$classe = new Classe($_POST['Id'],$_POST['Codice'], $_POST['Nome']);

		Classi::update($classe);

		echo "<div class='alert alert-success' role='alert'>
			  <a href='index.php?controller=Classi&action=visualizzaHome' class='alert-link'>Modifica eseguita con successo!</a>
			</div>";
	}
  }

?>