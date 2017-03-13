<?php
	require_once 'connection.php';

	class Istituti{

		public static function show(){
			$pdo = Connection::getConnection(); 
			$query = $pdo->query("SELECT * FROM istituti");
			$list = []; 
			foreach ($query->fetchAll() as $row) {
				$list[] = new Istituto($row['IdIstituto'], $row['Codice'], $row['Nome']);
        	}
			return $list;
		} 

		public static function add($istituto){
			$pdo = Connection::getConnection();
			$stmt = $pdo->prepare("INSERT INTO istituti VALUES (:idIstituto, :codice, :nome)");
			$stmt->execute(array(
				'idIstituto'=>$istituto->getIdIstituto(),
				'codice'=>$istituto->getCodice(),
				'nome'=>$istituto->getNome()));
		}

		public static function update($id, $newCodice, $newNome){
			$pdo = Connection::getConnection();
			$stmt=$pdo->query("UPDATE istituti SET Codice='".$newCodice."', Nome='".$newNome."' WHERE IdIstituto=".$id);
			/*$stmt->execute(array(
				'id'=>$id,
				'newCodice'=>$newCodice,
				'newNome'=>$newNome));*/
		}

		public static function delete($id){
			$pdo = Connection::getConnection();
			$stmt= $pdo->query("DELETE FROM istituti WHERE IdIstituto =".$id);
		}
	
}


	class Istituto{

		private $idIstituto;
		private $codice;
		private $nome;

		function __construct($idIstituto, $codice, $nome){
			$this->idIstituto = $idIstituto;
			$this->codice = $codice;
			$this->nome=$nome;

		} 

		function getIdIstituto(){
			return $this->idIstituto;
		}

		function getCodice(){
			return $this->codice;
		}

		function getNome(){
			return $this->nome;
		}

	}	
	?>