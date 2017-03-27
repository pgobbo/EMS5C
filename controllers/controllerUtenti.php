<?php
  class UtentiController {

  	public function add() {
      Utenti::add($_POST['userName'],md5($_POST['password']),$_POST['email']);
      $this->show();
  	}

  	public function modifica() {
       Utenti::modifica($_GET["userName"],$_GET["email"]);
      $this->show();
  	}

  	public function delete() {
      Utenti::delete($_GET['userName']);
       $this->show();
    }

  	public function update() {
       Utenti::update($_POST['userName'],md5($_POST['password']),$_POST['email']);
      $this->show();
  	}

  	public function show() {
      $listaUtenti = Utenti::selectAll();
      $actionButton=Utenti::$actionButton;
      if( !(isset($_GET["userName"])  && isset($_GET["email"]))  ){
        $userName="";
        $password="";
        $email="";
      } else {
        $userName=$_GET["userName"];
        $password="";
        $email=$_GET["email"];       
      }
       require_once('views/viewUtentiLista.php');
  	}

  	public function errore() {
      require_once('views/viewErrore404.php');
  	}


  }
?>