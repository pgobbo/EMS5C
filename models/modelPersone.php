<?php
  class Persona {
    private $idPersona;
    private $codiceFiscale;
    private $nome;
    private $cognome;
    private $recapito;
    private $tipoSpecializzazione;
    private $titolare;

    public function __construct($idPersona, $codiceFiscale, $nome,$cognome, $recapito, $tipoSpecializzazione, $titolare) {
      $this->idPersona = $idPersona;
      $this->codiceFiscale = $codiceFiscale;
      $this->nome = $nome;
      $this->cognome = $cognome;
      $this->recapito = $recapito;
      $this->tipoSpecializzazione = $tipoSpecializzazione;
      $this->titolare = $titolare;
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

    public function getTipoSpecializzazione(){
      return $this->tipoSpecializzazione;
    }

    public function getTitolare(){
      return $this->titolare;
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
        $lista[] = new Persona($persona['idPersona'], $persona['codiceFiscale'], $persona['nome'], $persona['cognome'], $persona['recapito'],$persona['tipoSpecializzazione'],$persona['titolare']);
      }

      return $lista;
    }

    public static function add($codiceFiscale, $nome,$cognome, $recapito, $tipoSpecializzazione, $titolare){
      //aggiunta controllo su tipospecializzazione e titolare
      if($codiceFiscale!="" && $nome!="" && $cognome!="" && $recapito!="" && $tipoSpecializzazione!="" && $titolare!=""){
        try{
          $connection=Connection::getConnection();
          $result=$connection->prepare("INSERT INTO persone(codiceFiscale, nome, cognome, recapito,tipoSpecializzazione,titolare) VALUES
            (:codiceFiscale, :nome, :cognome, :recapito,:tipoSpecializzazione,:titolare);");
          $result->execute(array('codiceFiscale'=>$codiceFiscale,':nome'=>$nome,
                     ':cognome'=>$cognome,':recapito'=>$recapito,':tipoSpecializzazione'=>$tipoSpecializzazione,':titolare'=>$titolare));
          echo "<p>Nuova Persona inserita!</p>";
        } catch (PDOException $ex){
          echo "Errore PDO nell'inserzione di una nuova Persona!";
        }
      } else {
        echo "<p>Riempi tutti i campi!</p>";
      }
    }

    public function modifica($idPersona, $codiceFiscale, $nome,$cognome, $recapito, $tipoSpecializzazione, $titolare){
      //Questo non esegue la query, setta i parametri per il form e cambia l'azione del bottone
      //La query viene eseguita dal metodo update che parte quando clicco il pulsante Salva 
      $this->idPersona = $idPersona;
      $this->codiceFiscale = $codiceFiscale;
      $this->nome = $nome;
      $this->cognome = $cognome;
      $this->recapito = $recapito;
      $this->tipoSpecializzazione = $tipoSpecializzazione;
      $this->titolare = $titolare;
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

    public function update($idPersona, $codiceFiscale, $nome,$cognome, $recapito, $tipoSpecializzazione, $titolare){
      //Tipo specializzazione e titolare sono per forza diversi da "" perche li seleziono da un menu a tendina
      if($codiceFiscale!="" && $nome!="" && $cognome!="" && $recapito!=""){
        try{
          $connection=Connection::getConnection();
          $result=$connection->prepare("UPDATE persone SET codiceFiscale=:codiceFiscale,nome=:nome,
                   cognome=:cognome,recapito=:recapito,tipoSpecializzazione=:tipoSpecializzazione,titolare=:titolare
                   WHERE idPersona=:idPersona;");
          $result->execute(array('codiceFiscale'=>$codiceFiscale,':nome'=>$nome,
                     ':cognome'=>$cognome,':recapito'=>$recapito,':tipoSpecializzazione'=>$tipoSpecializzazione,':titolare'=>$titolare,':idPersona'=>$idPersona));

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