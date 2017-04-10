<?php
  class Persona {
    private $idPersona;
    private $codiceFiscale;
    private $nome;
    private $cognome;
    private $recapito;
    private $idIstituto;
    private $idClasse;

    public function __construct($idPersona, $codiceFiscale, $nome,$cognome, $recapito,$idIstituto,$idClasse)
     {
      $this->idPersona = $idPersona;
      $this->codiceFiscale = $codiceFiscale;
      $this->nome = $nome;
      $this->cognome = $cognome;
      $this->recapito = $recapito;
      $this->idIstituto = $idIstituto;
      $this->idClasse = $idClasse;
    }

    public function getIdPersona(){
      return $this->idPersona;
    }

    public function getCodiceFiscale(){
      return $this->codiceFiscale;
    }

    public function getNome(){
      return $this->nome;
    }

    public function getCognome(){
      return $this->cognome;
    }

    public function getRecapito(){
      return $this->recapito;
    }

    public function getIdIstituto(){
      return $this->idIstituto;
    }

    public function getIdClasse(){
      return $this->idClasse;
    }

  }

  class Persone {
    public static $actionButton="insert";
    
    public static function selectAll() {
      $lista = [];
      $connection=Connection::getConnection();
      $risultato = $connection->prepare('SELECT * FROM persone');
      $risultato->execute();

      foreach($risultato->fetchAll() as $persona) {
        $lista[] = new Persona($persona['idPersona'], $persona['codiceFiscale'], $persona['nome'], $persona['cognome'], $persona['recapito'],$persona['idIstituto'],$persona['idClasse']);
      }

      return $lista;
    }

    public static function add($idPersona, $codiceFiscale, $nome,$cognome, $recapito,$idIstituto,$idClasse){
      //aggiunta controllo su tipospecializzazione e titolare
      if($codiceFiscale!="" && $nome!="" && $cognome!="" && $recapito!="" && $titolare!="" && $idIstituto="" && $idClasse=""){
        try{
          $connection=Connection::getConnection();
          $result=$connection->prepare("INSERT INTO persone(codiceFiscale, nome, cognome, recapito,titolare,idIstituto,idClasse) VALUES
            (:codiceFiscale, :nome, :cognome, :recapito,:idIstituto,:idClasse);");
          $result->execute(array('codiceFiscale'=>$codiceFiscale,':nome'=>$nome,
                     ':cognome'=>$cognome,':recapito'=>$recapito,
                     ':idIstituto'=>$idIstituto,
                     ':idClasse'=>$idClasse));
          echo "<p>Nuova Persona inserita!</p>";
        } catch (PDOException $ex){
          echo "Errore PDO nell'inserzione di una nuova Persona!";
        }
      } else {
        echo "<p>Riempi tutti i campi!</p>";
      }
    }

    public function modifica($idPersona, $codiceFiscale, $nome,$cognome, $recapito,$idIstituto,$idClasse){
      //Questo non esegue la query, setta i parametri per il form e cambia l'azione del bottone
      //La query viene eseguita dal metodo update che parte quando clicco il pulsante Salva 
      $this->idPersona = $idPersona;
      $this->codiceFiscale = $codiceFiscale;
      $this->nome = $nome;
      $this->cognome = $cognome;
      $this->recapito = $recapito;
      $this->idIstituto = $idIstituto;
      $this->idClasse = $idClasse;
      self::$actionButton="save";
    }

    public static function delete($idPersona){
      try{
          $connection=Connection::getConnection();
          $risultato = $connection->prepare('DELETE FROM persone WHERE idPersona='.$idPersona.';');
          $risultato->execute();
          echo "<p>Persona Cancellata!</p>";
        } catch (PDOException $ex){
          echo "Errore PDO nella cancellazione della Persona!";
        }        
    }

    public function update($idPersona, $codiceFiscale, $nome,$cognome, $recapito,$idIstituto,$idClasse){
      //Tipo specializzazione e titolare sono per forza diversi da "" perche li seleziono da un menu a tendina
      if($codiceFiscale!="" && $nome!="" && $cognome!="" && $recapito!="" && $titolare!="" && $idIstituto="" && $idClasse=""){
        try{
          $connection=Connection::getConnection();
          $result=$connection->prepare("UPDATE persone SET codiceFiscale=:codiceFiscale,nome=:nome,
                   cognome=:cognome,recapito=:recapito,idIstituto=:idIstituto,idClasse=:idClasse
                   WHERE idPersona=:idPersona;");
          $result->execute(array('codiceFiscale'=>$codiceFiscale,':nome'=>$nome,
                     ':cognome'=>$cognome,':recapito'=>$recapito,
                     ':idIstituto'=>$idIstituto,
                     ':idClasse'=>$idClasse,
                     ':idPersona'=>$idPersona));

          echo "<p>Modifiche Salvate!</p>";
        } catch (PDOException $ex){
          echo "Errore PDO nel salvataggio delle modifiche alla Persona!";
        }
      } else {
        echo "<p>Verifica la correttezza dei campi (update del model persona)!</p>";
      }
      
    }
  }    
?>