<?php 
	function getIstitutoFromPersona($id) {
		$query="SELECT idIstituto FROM Persone WHERE idPersona=:id";
		$conn=Connection::getConnection();
		$stmt=$conn->prepare($query);
		$stmt->execute(array("id"=>$id));
		$parz=$stmt->fetch();
		$value=$parz['idIstituto'];
		return $value;
	}

	function getEdificiFromIstituto($id) {
		$query="SELECT idEdificio FROM Edifici WHERE idIstituto=:id";
		$tbr=[];
		$conn=Connection::getConnection();
		$stmt=$conn->prepare($query);
		$stmt->execute(array("id"=>$id));
		foreach ($stmt as $edificio) {
			$tbr[]=$edificio['idEdificio'];
		}
		return $tbr;
	}

	function getLocaliFromEdificio($id) {
		$query="SELECT IdLocale FROM Locali WHERE IdEdificio=:id";
		$tbr=[];
		$conn=Connection::getConnection();
		$stmt=$conn->prepare($query);
		$stmt->execute(array("id"=>$id));
		foreach ($stmt as $locale) {
			$tbr[]=$locale['IdLocale'];
		}
		return $tbr;
	}

	function getEdificiFromPersona($id) {
		getEdificiFromIstituto(getIstitutoFromPersona($id));
	}

	function getgetLocaliFromPersona($id) {
		getLocaliFromEdificio(getEdificiFromIstituto(getIstitutoFromPersona($id)));
	}

 ?>