<!--Form inserimento e modifica-->
<?php
    echo "<div class='content'>
    	<form action='index.php' method='post'>
            codiceFiscale:
            <input type='text' name='codiceFiscale' value='".$codiceFiscale."'>
            <br>
            nome:
            <input type='text' name='nome' value='".$nome."'>
            <br>
            cognome:
            <input type='text' name='cognome' value='".$cognome."'>
            <br>
            recapito:
            <input type='text' name='recapito' value='".$recapito."'>
            <br>
            tipo specializzazione:
            <select name='tipoSpecializzazione'>"; 
                require_once('models/modelPersoneTipoSpecializzazioni.php');
                $listaTipi= TipiSpecializzazione::selectAll();
                foreach($listaTipi as $tipo){
                    echo "<option value='".$tipo->getIdTipoSpecializzazione()."' ";
                    if($tipo->getIdTipoSpecializzazione()==$tipoSpecializzazione){
                        echo "selected='selected'>";
                    } else {
                        echo ">";
                    }
                    echo $tipo->getNome()."</option>";
                }
    echo "</select>
            <br>
            titolare:<br>
            <select name='titolare' >";
			//questo non lo stampo... Invece si senno non apre il tag <option>per mostrare l'opzione
                echo "<option value='".$titolare."' ";
                if($titolare==0) {
                    echo "selected='selected'>No</option>
                    <option value='1'>Si</option>";
                } else {
                    echo "selected='selected'>Si</option>
                    <option value='0'>No</option>";
                }
        echo "</select>
            <br><br>";
            if($actionButton=="insert"){
                echo "<input type='hidden' name='action' value='add'>
                        <input type='hidden' name='controller' value='Persone'>
                        <input type='submit' value='Inserisci'>
                        </form> ";
            } else if ($actionButton=="save"){
                echo "<input type='hidden' name='action' value='update'>
                        <input type='hidden' name='idPersona' value='".$idPersona."'>
                        <input type='hidden' name='controller' value='Persone'>
                        <input type='submit' value='Salva Modifiche'>
                        </form> ";
            }
?>        
                
<table border=black>
	<thead>
    	<th>idPersona</th><th>codiceFiscale</th><th>nome</th><th>cognome</th><th>recapito</th><th>tipoSpecializzazione</th><th>titolare</th><th>Modifica</th>
    </thead>
    	<tbody>
        	<?php
        		foreach($listaPersone as $persona){
                    echo "<tr>";
                    echo "<td>".$persona->getIdPersona()."</td><td>".$persona->getCodiceFiscale()."</td><td>".$persona->getNome()."</td><td>".$persona->getCognome()."</td><td>"
                            .$persona->getRecapito()."</td><td>".$persona->getTipoSpecializzazione()."</td>";
							if($persona->getTitolare()==0){
                                echo "<td>Si</td>"; // ho aggiunto l''echo' senno non stampa l'html sulla pagina
                            }else {
                                echo "<td>No</td>";
                            }
                    echo "<td><a href='index.php?action=delete&controller=Persone&idPersona=".$persona->getIdPersona()."'><button>Elimina</button></a>";
                    echo "<a href='index.php?action=modifica&controller=Persone&idPersona=".$persona->getIdPersona()."&codiceFiscale=".$persona->getCodiceFiscale()."
                            &nome=".$persona->getNome()."&cognome=".$persona->getCognome()."&recapito=".$persona->getRecapito()."&tipoSpecializzazione=".$persona->getTipoSpecializzazione()."&titolare=".$persona->getTitolare()."'><button>Modifica</button></a></td>";
                    echo "</tr>";
                    echo "<br>";
                }
        	?>
        </tbody>
</table>
</div>