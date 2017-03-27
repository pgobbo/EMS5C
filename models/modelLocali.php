<?php
require_once("./connection.php");
    class Locale {
        private $id;
        private $codice;
        private $descrizione;
        private $IdEdificio;
        
        function __construct($id,$codice,$descrizione,$IdEdificio){
            $this->id=$id;
            $this->codice=$codice;
            $this->descrizione=$descrizione;
            $this->IdEdificio=$IdEdificio;
        }

        function getId(){
            return $this->id;
        }

        function getCodice(){
            return $this->codice;
        }
        
        function getDescrizione(){
            return $this->descrizione;
        }

        function getIdEdificio(){
            return $this->IdEdificio;
        }
           
        function addLocale(){
            $db=Connection::getConnection();
            $stmt="INSERT INTO locali(Codice,Descrizione,IdEdificio) values('".$this->codice."','".$this->descrizione."','".$this->IdEdificio."')";
            return $db->exec($stmt);
        }
    }

    class Locali{

        function getAll(){
            $query="SELECT * FROM locali";
            return $query;
        }

        function getFindQuery($id,$codice,$descrizione,$IdEdificio){
            $query="SELECT * from locali where IdLocale like '%".$id."%' and Codice like '%".$codice."%' and Descrizione like'%".$descrizione."%' and IdEdificio like '%".$IdEdificio."%'";
            return $query;
        }

        function getLocali($query){
            $db= Connection::getConnection();
            //$db= new PDO('mysql:host=192.168.1.252;dbname=singola5cin','5cpegoraro' ,'PegoNicoRaro');
            $results= $db->query($query);
            $i=0;
            $locali= array();
            foreach($results as $row){
                $locale= new Locale($row['IdLocale'],$row['Codice'],$row['Descrizione'],$row['IdEdificio']);
                $locali[$i]=$locale;
                $i++;
            }
            return $locali;
        }

        function delete($idLocale){
                $db=Connection::getConnection();
                $query="DELETE FROM locali WHERE idLocale='".$idLocale."'";
                $exec=$db->exec($query);
                return $exec;
        }

        function modify(){
            $db=Connection::getConnection();
            try{
                $query="UPDATE locali SET Codice ='".$_POST['Codice']."' , Descrizione = '".$_POST['Descrizione']."', IdEdificio = ".$_POST['IdEdificio']." WHERE IdLocale = ".$_POST['IdLocale']."";
                //print_r($query);
                $exec=$db->exec($query);

            }catch(PDOException $ex){
                print_r("Errore nell'inserimento dei dati");
                $exec=0;
            }
            return $exec;
        }
    }
?>