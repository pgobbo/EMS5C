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
    	<th>idPersona</th><th>codiceFiscale</th><th>nome</th><th>cognome</th><th>recapito</th><th>Modifica</th>
    </thead>
    	<tbody>
        	<?php
        		foreach($listaPersone as $persona){
                    echo "<tr>";
                    echo "<td>".$persona->getIdPersona()."</td><td>".$persona->getCodiceFiscale()."</td><td>".$persona->getNome()."</td><td>".$persona->getCognome()."</td><td>"
                            .$persona->getRecapito()."</td>";
                    echo "<td><a href='index.php?action=delete&controller=Persone&idPersona=".$persona->getIdPersona()."'><button>Elimina</button></a>";
                    echo "<a href='index.php?action=modifica&controller=Persone&idPersona=".$persona->getIdPersona()."&codiceFiscale=".$persona->getCodiceFiscale()."
                            &nome=".$persona->getNome()."&cognome=".$persona->getCognome()."&recapito=".$persona->getRecapito()."'><button>Modifica</button></a></td>";
                    echo "</tr>";
                    echo "<br>";
                }
        	?>
        </tbody>
</table>
</div>