<?php
	class Utente{
		private $idUtente;
		private $userName;
		private $password;
		private $email;
		private $admin;

		public function __construct($idUtente,$userName,$password,$email,$admin){
		 	$this->idUtente = $idUtente;
      		$this->userName = $userName;
      		$this->password = $password;
      		$this->email = $email;
      		$this->admin = $admin;
		}

		public function getIdUtente(){
      		return $this->idUtente;
   		}

   		public function getUserName(){
      		return $this->userName;
   		}

   		public function getPassword(){
      		return $this->password;
   		}

   		public function getEmail(){
      		return $this->email;
   		}

   		public function getAdmin(){
   			return $this->admin;
   		}

	}

	class Utenti{
		public static $actionButton="insert";

		public static function getAdmin($username,$password){
			$connection=Connection::getConnection();
			$result=$connection->prepare("SELECT admin FROM utenti WHERE password='".$password."' AND userName='".$username."';");
	    	$result->execute();
	    	$admin = $result->fetchAll()['admin'];
	    	return $admin;
		}
    
	    public static function selectAll() {
		     $lista = [];
		     $connection=Connection::getConnection();
		     $risultato = $connection->prepare('SELECT * FROM utenti');
		     $risultato->execute();
		     foreach($risultato->fetchAll() as $utente) {
		        $lista[] = new Utente($utente['idUtente'], $utente['userName'], $utente['password'], $utente['email']);
		     }

		     return $lista;
	    }

	    public static function add($userName,$password,$email){
	     	 if( $userName!="" && $password!="" && $email!=""){

	         try{
	          	 $connection=Connection::getConnection();
	          	 $result=$connection->prepare("INSERT INTO utenti(userName, password, email)
	          	 	 VALUES ( :userName, :password, :email);");
	          	 $result->execute(array(':userName'=>$userName,
	                     ':password'=>$password,':email'=>$email));
	             echo "<p>Nuovo Utente inserito!</p>";
	        	} catch (PDOException $ex){
	         		 echo "Errore PDO nell'inserzione di una nuovo Utente!";
	        	}
	      	} else {
	        	 echo "<p>Riempi tutti i campi!</p>";
	      }

    	}

    	public function modifica($userName, $email){
	        $this->userName = $userName;
	      	$this->email = $email;
	        self::$actionButton="save";
    	}

    	public static function delete($userName){
	      try{
	          $connection=Connection::getConnection();
	          $risultato = $connection->prepare('DELETE FROM utenti WHERE userName="'.$userName.'";');
	          $risultato->execute();
	          echo "<p>Utente Cancellato!</p>";
	        } catch (PDOException $ex){
	          echo "Errore PDO nella cancellazione dell'Utente!";
	        }        
	    }

		public function update($userName,$password, $email){
	       if( $userName!="" && $password!="" && $email!=""){
		        try{
		          $connection=Connection::getConnection();
		          $result=$connection->prepare("UPDATE utenti SET
		                  password=:password,email=:email
		                  WHERE userName=:userName;");
		          $result->execute(array(':userName'=>$userName,
		                     ':password'=>$password,':email'=>$email));

		          echo "<p>Modifiche Salvate!</p>";
		        } catch (PDOException $ex){
		          echo "Errore PDO nel salvataggio delle modifiche all'Utente!";
		        }
	        } else {
	        echo "<p>Verifica la correttezza dei campi (update del model utente)!</p>";
	        }	      
	    }

	    public static function checkLoginInput($username,$password){
	    	$connection=Connection::getConnection();
	    	//$result=$connection->prepare("SELECT * FROM utenti WHERE password='".md5("pollo")."' AND userName='pollo';");

	    	$result=$connection->prepare("SELECT * FROM utenti WHERE password='".$password."' AND userName='".$username."';");
	    	$result->execute();
	    	if($result->rowCount()){
	    		return true;
	    	} else {
	    		return false;
	    	}
	    }
	}
?>