<?php
class TipoSpecializzazione{
	private $idTipoSpecializzazione;
	private $nome;
	private $descrizione;


	public function __construct($id,$name,$desc){
		$this->idTipoSpecializzazione=$id;
		$this->nome=$name;
		$this->descrizione=$desc;

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
	public function setIdTipoSpecializzazione($idTipoSpecializzazione){
		$this->idTipoSpecializzazione=$idTipoSpecializzazione;
	}
	public function setNome($idTipoSpecializzazione){
		$this->nome=$nome;
	}
	public function setDescrizione($idTipoSpecializzazione){
		$this->descrizione=$descrizione;
	}
}

class TipoSpecializzazioni{
 public static $actionButton="insert";
 
	 public static function selectAll() {


      $lista = array();
      $connection=Connection::getInstance();
      //nome tabella su maria db non accetta le maiuscole
      $risultato = $connection->query('SELECT * FROM tipospecializzazioni;');
      $i=0;
      foreach($risultato as $tipoSpecializzazione) {
        $specializzazione = new TipoSpecializzazione($tipoSpecializzazione['idSpecializzazione'], $tipoSpecializzazione['nome'], $tipoSpecializzazione['descrizione']);

        
        $specializzazione = new TipoSpecializzazione($tipoSpecializzazione['idSpecializzazione'], $tipoSpecializzazione['nome'], $tipoSpecializzazione['descrizione']);
        //echo "obj";
        //var_dump($specializzazione);
        $lista[$i]=$specializzazione;
        $i++;
        
      }

      return $lista;
    }

    public static function add($nome,$descrizione){
      if($nome!="" && $descrizione!="" ){
        try{
          $connection=Connection::getInstance();
          $result=$connection->prepare("INSERT INTO tipospecializzazioni( nome, descrizione) VALUES
            (:nome, :descrizione)");
          $result->execute(array(':nome'=>$nome,
                     ':descrizione'=>$descrizione));
          echo "<p>Nuova specializzazione inserita!</p>";
        } catch (PDOException $ex){
          echo "Errore PDO nell'inserzione di una specializzazione!";
        }
      } else {
        echo "<p>Riempi tutti i campi!</p>";
      }
    }


    public function modifica($idTipoSpecializzazione, $nome,$descrizione){
     // $this->idTipoSpecializzazione = $idTipoSpecializzazione; non si può cambiare la PK
      $this->nome = $nome;
      $this->descrizione = $descrizione;
      self::$actionButton="save";
    }

    public static function delete($idTipoSpecializzazione){
      try{
          $connection=Connection::getInstance();
          $risultato = $connection->query('DELETE FROM tipospecializzazioni WHERE idSpecializzazione='.$idTipoSpecializzazione.';');
          echo "<p>tipo specializzazione Cancellata!</p>";
        } catch (PDOException $ex){
          echo "Errore PDO nella cancellazione del tipo specializzazione!";
        }        
    }
    
     public function update($idTipoSpecializzazione,$nome,$descrizione){
      if($idTipoSpecializzazione!="" && $nome!="" && $descrizione!=""){
        try{
          $connection=Connection::getInstance();
          $result=$connection->prepare("UPDATE tipospecializzazioni SET nome=:nome,
                   descrizione=:descrizione
                   WHERE idSpecializzazione=:idSpecializzazione;");
          $result->execute(array('idSpecializzazione'=>$idTipoSpecializzazione,':nome'=>$nome,
                     ':descrizione'=>$descrizione));

          echo "<p>Modifiche Salvate!</p>";
        } catch (PDOException $ex){
          echo "Errore PDO nel salvataggio delle modifiche al tipo di specializazione !";
        }
      } else {
        echo "<p>Verifica la correttezza dei campi (update del model tipo specializzazione)!</p>";
      }
      
    }

}

?>