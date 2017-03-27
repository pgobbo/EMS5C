<?php
  //--------------------------------DO--------------------------------

  class Classe {

    public $id, $codice, $nome;

    public function __construct($id, $codice, $nome) {
      $this->id = $id;
      $this->codice = $codice;
      $this->nome = $nome;
    }

    //GET---------
    
    public function getId(){
      return $this->id;
    }

    public function getCodice(){
      return $this->codice;
    }

    public function getNome(){
      return $this->nome;
    }

  }

  //--------------------------------DAO--------------------------------

  class Classi {

    public static function getArrayQuery($Id, $Codice, $Nome){
      $classi = array();
      require_once('/../connection.php');
      
      /*if($productCode == "" && $productLine == '' && $productDescription == "")
          return "";
      else{*/ //ALL
        $query = "SELECT * FROM classi WHERE Id like '%".$Id."%' and Codice like '%".$Codice."%' and Nome like '%".$Nome."%'";
      //}

      try{
        $db = Connection::getConnection();
        $result = $db->query($query);
        $i = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
          $classi[$i] = new Classe ($row['Id'], $row['Codice'], $row['Nome']);
          $i = $i + 1;
        }

        return $classi;

      }catch (PDOException $e){
        echo "<p>Nessun elemento trovato</p>";
      }
    }

    
    //-------------------------------
    public static function insert($classe){

      require_once('/../connection.php');

      try{
        $db = new Db();
        $query = "INSERT INTO classi(Id, Codice, Nome) VALUES('','".$classe->getCodice()."','".$classe->getNome()."')";

        $stmt = $db->query($query);

      }catch (PDOException $e){
        print_r($e);
        echo "<p>Inserimento non riuscito</p>";
      }
      
    }

    //-------------------------------
    public static function update($classe){

      require_once('/../connection.php');

      try{

        $db = new Db();
        $query = "UPDATE classi SET 
          Nome = '".$classe->getNome()."',
          Codice = '".$classe->getCodice()."'
          WHERE Id = '".$classe->getId()."'";

        $stmt = $db->query($query);

      }catch (PDOException $e){
        echo "<p>Aggiornamento non riuscito</p>";
      }
      
    }
    //-------------------------------
    public static function delete($Id){

      require_once('/../connection.php');

      try{
        $db = new Db();
        $query = "DELETE FROM classi WHERE Id = '".$Id."'";
        $stmt = $db->query($query);

      }catch (PDOException $e){
        echo "<p>Eliminazione non riuscita</p>";
      }
      
    }


    //--------------------------------html--------------------------------
    public static function getHtmlTable($classi){

      $table = "<table class='table table-bordered'>";
      $table = $table."<tr><th>Id</th><th>Codice</th><th>Nome</th><th>Update</th><th>Delete</th></tr>";

      foreach($classi as $c){

        $table = $table."<tr>";
        $table = $table."<td>".$c->getId()."</td><td>".$c->getCodice()."</td><td>".$c->getNome()."</td>";
        $table = $table."<td>
          <form action='index.php' method='post'>
            <input type='hidden' name='Id' value='".$c->getId()."'>
            <input type='hidden' name='action' value='cancella'>
            <input type='hidden' name='controller' value='ControllerClassi'>
            
            <button type='submit' class='btn btn-danger'>Delete</button>
          </form></td>";
        $table = $table."<td>
          <form action='index.php' method='post'>
            <input type='hidden' name='Id' value='".$c->getId()."'>
            <input type='hidden' name='action' value='visualizzaModifica'>
            <input type='hidden' name='controller' value='ControllerClassi'>
            
            <button type='submit' class='btn btn-info' >Update</button>
          </form></td>";
          
        $table = $table."</tr>";
      }

      $table = $table."</table>";

      return $table;
    }

    //-------------------------------
    public static function getHtmlFormModifica($Id){

      $classe = self::getArrayQuery($Id,"","")[0];

      $form = "<form action='index.php' method='post'>
        <label>Id:</label><br>
        <input type='text' readonly='readonly' class='form-control' name='Id' value='".$Id."' style='color:red'>
        <br><label>Codice:</label><br>
        <input type='text' class='form-control' name='Codice' value='".$classe->getCodice()."'>
        <br><label>Nome:</label><br>
        <input type='text' class='form-control' name='Nome' value='".$classe->getNome()."'>
        <br>
        <input type='hidden' name='action' value='modifica'>
        <input type='hidden' name='controller' value='ControllerClassi'>
        <input type='submit' class='btn btn-primary' value='MODIFICA'>
        
      </form>";

      return $form;

    }

  }
?>