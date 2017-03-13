<?php
	class TipoSpecializzazioniController{

		public function show(){
			$listaTipoSpecializzazioni = TipoSpecializzazioni::selectAll();
	     	 $actionButton=TipoSpecializzazioni::$actionButton;
	     	 if(!(isset($_GET["idTipoSpecializzazione"]) && isset($_GET["nome"]) && isset($_GET["descrizione"]))){
		        $idTipoSpecializzazione="nessuno";
		        $nome="";
		        $descrizione="";
	      	} else {
		        $idTipoSpecializzazione=$_GET["idTipoSpecializzazione"];
		        $nome=$_GET["nome"];
		        $descrizione=$_GET["descrizione"]; 
	     	 }
	      	require_once('views/viewTipoSpecializzazioniLista.php');
		}

		public function add(){
	      TipoSpecializzazioni::add($_POST['nome'],$_POST['descrizione']);
	      $this->show();
   		}

   		public function modifica(){
	      TipoSpecializzazioni::modifica($_GET['idTipoSpecializzazione'],$_GET["nome"],$_GET["descrizione"]);
	      $this->show();
	    }

	    public function update(){
	      TipoSpecializzazioni::update($_POST['idTipoSpecializzazione'],$_POST['nome'],$_POST['descrizione']);
	      $this->show();
	    }

	    public function delete(){
	      TipoSpecializzazioni::delete($_GET['idTipoSpecializzazione']);
	      $this->show();
	    }

	 	public function errore() {
	     	 require_once('views/errore.php');
	    }

	}
?>