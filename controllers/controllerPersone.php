<?php

  require_once("/../models/modelPersone.php");

  class PersoneController {
    //modifica da get a post
    
    //Ho rimesso il GET perche sono obbligato ad usarlo visto che devo mostrare i parametri passati dal bottone di modifica che non e un form
    public function show() {
      $listaPersone = Persone::selectAll();
      $actionButton=Persone::$actionButton;
      if(!(isset($_GET["idPersona"]) && isset($_GET["codiceFiscale"]) && isset($_GET["nome"]) && isset($_GET["cognome"]) && isset($_GET["recapito"]) && isset($_GET["idIstituto"]) &&  isset($_GET["idClasse"]) )){
        $idPersona="nessuno";
        $codiceFiscale="";
        $nome="";
        $cognome="";
        $recapito="";
        $idIstituto="";
        $idClasse="";
      } else {
        $idPersona=$_GET["idPersona"];
        $codiceFiscale=trim($_GET["codiceFiscale"]); //ho usato il trim perche gli venivano passati spazi dopo la fine della stringa
        $nome=$_GET["nome"];
        $cognome=$_GET["cognome"];
        $recapito=$_GET["recapito"];
        $idIstituto=$_GET["idIstituto"];
        $idClasse=$_GET["idClasse"];
      }
      require_once('views/viewPersoneLista.php');
    }

    public function add(){
      Persone::add($_POST['codiceFiscale'],$_POST['nome'],$_POST['cognome'],$_POST['recapito'],$_POST['idIstituto'],$_POST['idClasse']);
      $this->show();
    }

    public function modifica(){
      //Sul modifica ho rimesso il GET perche i parametri gli vengono passati con quello in quanto sono obbligato perche non è un form
      Persone::modifica($_GET['idPersona'],$_GET["codiceFiscale"],$_GET["nome"],$_GET["cognome"],$_GET["recapito"],$_GET["idIstituto"],$_GET["idClasse"]);
      $this->show();
    }

    public function update(){
      Persone::update($_POST['idPersona'],$_POST['codiceFiscale'],$_POST['nome'],$_POST['cognome'],$_POST['recapito'],$_POST['idIstituto'],$_POST['idClasse']);
      $this->show();
    }

    public function delete(){
      Persone::delete($_GET['idPersona']);
      $this->show();
    }

    public function errore() {
      require_once('views/viewError404.php');
    }
  }
?>