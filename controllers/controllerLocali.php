<?php	
require_once("models/modelLocali.php");

	class controllerLocali{

		function showHome(){
			require_once("views/viewLocaliHome.php");
		}

		function showInput(){
			require_once("views/viewLocaliInput.php");
		}

		function showModify(){
			require_once("./views/viewLocaliModify.php");
		}

		function add(){
			$codice=$_POST['Codice'];
			$descrizione=$_POST['Descrizione'];
			$IdEdificio=$_POST['IdEdificio'];

			$locale= new Locale(null,$codice,$descrizione,$IdEdificio);
			if($locale->addLocale()){
				echo"<script type='text/javascript'>alert('Inserimento andato a buon fine');</script>";
			}else
				echo"<script type='text/javascript'>alert('Inserimento non è andato a buon fine');</script>";

			require_once("views/viewLocaliHome.php");
		}

		function find(){

			$IdLocale="";
			$Codice="";
			$Descrizione="";
			$IdEdificio="";

		    if(isset($_GET['IdLocale'])){
		        $IdLocale=$_GET['IdLocale'];
		    }
		    
		    if(isset($_GET['Codice'])){
		        $Codice=$_GET['Codice'];
		    }

		    if(isset($_GET['Descrizione'])){
		        $Descrizione=$_GET['Descrizione'];
		    }

		    if(isset($_GET['IdEdificio'])){
		        $IdEdificio=$_GET['IdEdificio'];
		    }

		    $locali=new Locali();
		    $query=$locali->getFindQuery($IdLocale,$Codice,$Descrizione,$IdEdificio);
		    
		    $list_locali=$locali->getLocali($query);

		    $_GET['locali']=$list_locali;
		    require_once("views/viewLocaliHome.php");
		}

		function createTable(){
			
			if(isset($_GET['locali'])){
				foreach ($_GET['locali'] as $row=>$value) {
					echo "<tr> <form>";
						echo "<td align='center'> <input type='hidden' name='IdLocale' value='".$value->getId()."'>".$value->getId()."</td>";
						echo "<td align='center'> <input type='hidden' name='Codice' value='".$value->getCodice()."'>".$value->getCodice()."</td>";
						echo "<td align='center'> <input type='hidden' name='Descrizione' value='".$value->getDescrizione()."'>".$value->getDescrizione()."</td>";
						echo "<td align='center'> <input type='hidden' name='IdEdificio' value='".$value->getIdEdificio()."'>".$value->getIdEdificio()."</td>";
						echo "<td> <button type='submit' formmethod='post' formaction='index.php?controller=Locali&action=showModify' class='btn btn-primary'>Modifica</td>";
						echo "<td> <button type='submit' formmethod='post' formaction='index.php?controller=Locali&action=delete' class='btn btn-danger'>Cancella</td>";
					echo "</form></tr>";
				}
			}
			else{

				$locali=new Locali();
				$query=$locali->getAll();
				$list_locali=$locali->getLocali($query);
				
				foreach ($list_locali as $row=>$value) {
						echo "<tr> <form >";
							echo "<td align='center'> <input type='hidden' name='IdLocale' value='".$value->getId()."'>".$value->getId()."</td>";
							echo "<td align='center'> <input type='hidden' name='Codice' value='".$value->getCodice()."'>".$value->getCodice()."</td>";
							echo "<td align='center'> <input type='hidden' name='Descrizione' value='".$value->getDescrizione()."'>".$value->getDescrizione()."</td>";
							echo "<td align='center'> <input type='hidden' name='IdEdificio' value='".$value->getIdEdificio()."'>".$value->getIdEdificio()."</td>";
							echo "<td> <button type='submit' formmethod='post' formaction='index.php?controller=Locali&action=showModify' class='btn btn-primary'>Modifica</td>";
							echo "<td> <button type='submit' formmethod='post' formaction='index.php?controller=Locali&action=delete' class='btn btn-danger'>Cancella</td>";
							
						echo "</form></tr>";
					}
			}
		}
	
		

		function delete(){
			//print_r($_POST['IdLocale']);
			if(Locali::delete($_POST['IdLocale'])){
				echo("<script type='text/javascript'>alert('Ho rimosso il Prodotto ".$_POST['IdLocale']."!');</script>");
				require_once("./views/viewLocaliHome.php");
			}else{
				echo("<script type='text/javascript'>alert('NON SONO RIUSCITO A RIMUOVERE IL PRODOTTO ".$_POST['IdLocale']."! ');</script>");
				require_once("./views/viewLocaliHome.php.php");
			}
		}

		function modify(){
			if(Locali::modify()){
				echo "<script type='text/javascript'>alert('fattissimooo!');</script>";
				require_once("./views/viewLocaliModify.php");
			}else{
				
			echo "<script type='text/javascript'>alert('NON SONO RIUSCITO AD AGGIORNARE IL PRODOTTO!".$_POST['IdLocale']."!');</script>";
			require_once("./views/viewLocaliModify.php");
			}
		}
    }
?>