<?php
  require_once('connection.php');

  class TipoSpecializzazione {
    private $idTipoSpecializzazione;
    private $descrizione;
    private $nome;

    public function __construct($idTipoSpecializzazione,$descrizione,$nome) {
      $this->idTipoSpecializzazione=$idTipoSpecializzazione;
      $this->descrizione = $descrizione;
      $this->nome=$nome;
    }
    
    public function getIdTipoSpecializzazione(){
      return $this->idTipoSpecializzazione;
    }

    public function getNome(){
      return $this->nome;
    }

    public function getDescrizione(){
      return $this->descrizione;
    }

  }

  class TipiSpecializzazione {
    public static function selectAll(){
      $lista = [];
      $connection=Connection::getConnection();
      $risultato = $connection->prepare('SELECT * FROM tipospecializzazioni;');
      $risultato->execute();
      foreach($risultato->fetchAll() as $tipoSpecializzazione) {
        $lista[] = new TipoSpecializzazione($tipoSpecializzazione['idSpecializzazione'],$tipoSpecializzazione['nome'],$tipoSpecializzazione['descrizione']);
      }

      return $lista;
    }
  }
?>