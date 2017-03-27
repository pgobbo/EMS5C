<?php
	class Utente{
		private $idUtente;
		private $userName;
		private $password;
		private $email;

		public function __construct($idUtente,$userName,$password,$email){
		 	$this->idUtente = $idUtente;
      		$this->userName = $userName;
      		$this->password = $password;
      		$this->email = $email;
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

	}

	class Utenti{
		public static $actionButton="insert";
    
	    public static function selectAll() {
		     $lista = [];
		     $connection=Connection::getInstance();
		     $risultato = $connection->query('SELECT * FROM utenti');
		     foreach($risultato->fetchAll() as $utente) {
		        $lista[] = new Utente($utente['idUtente'], $utente['userName'], $utente['password'], $utente['email']);
		     }

		     return $lista;
	    }

	    public static function add($userName,$password,$email){
	     	 if( $userName!="" && $password!="" && $email!=""){

	         try{
	          	 $connection=Connection::getInstance();
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
	          $connection=Connection::getInstance();
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
		          $connection=Connection::getInstance();
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
	}
?>