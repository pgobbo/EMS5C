<?php 
	class Edificio {

		private $id,$codice,$nome,$idIstituto;

		public function __construct($id,$codice,$nome,$idIstituto) {
			$this->id=$id;
			$this->codice=$codice;
			$this->nome=$nome;
			$this->idIstituto=$idIstituto;
		}

		public function getIdEdificio() {
			return $this->id;
		}

		public function getCodice() {
			return $this->codice;
		}

		public function getNome(){
			return $this->nome;
		}

		public function getIdIstituto() {
			return $this->idIstituto;
		}
	}

	class Edifici {
		private function __construct() {}

		public static function add($codice,$nome,$idIstituto) {
			$pdo=Connection::getConnection();
			$stmt=$pdo->prepare('INSERT INTO edifici (Codice, Nome, IdIstituto) VALUES (:codice , :nome , :idIstituto)');
			$stmt->execute(array(
				'codice'=>$codice,
				'nome'=>$nome,
				'idIstituto' =>$idIstituto
			));
		}

		public static function show() {
			$pdo=Connection::getConnection();
			$result=$pdo->query('SELECT * FROM edifici');
			$edifici=[];
			foreach ($result->fetchAll() as $edificio) {
				$edifici[] = new Edificio($edificio['IdEdificio'],$edificio['Codice'],$edificio['Nome'],$edificio['IdIstituto']);
			}
			return $edifici;
		}

		public static function update($idEdificio, $newCodice, $newNome, $idIstituto) {
			$pdo=Connection::getConnection();
			$stmt=$pdo->prepare('UPDATE edifici SET Codice=:newCodice , Nome=:newNome , IdIstituto=:idIstituto WHERE IdEdificio=:idEdificio');
			$stmt->execute(array(
				'newCodice'=>$newCodice,
				'newNome'=>$newNome,
				'idEdificio'=>$idEdificio,
				'idIstituto'=>$idIstituto
			));
		}

		public static function delete($id) {
			$pdo=Connection::getConnection();
			$stmt=$pdo->prepare('DELETE FROM edifici WHERE IdEdificio=:id');
			$stmt->execute(array(
				'id'=>$id
			));
		}
	}
?>