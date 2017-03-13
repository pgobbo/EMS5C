<!--Form inserimento e modifica-->
<?php
    echo "<form action='index.php' method='post'>
            idTipoSpecializzazione:
            <input type='text' readonly name='idTipoSpecializzazione' value='".$idTipoSpecializzazione."'>
            <br>
            nome:
            <input type='text' name='nome' value='".$nome."'>
            <br>
            descrizione:
            <textarea type='text' rows='3' cols='50' name='descrizione'>".$descrizione."</textarea>
            
            <br>";
            if($actionButton=="insert"){
                echo "<input type='hidden' name='action' value='add'>
                        <input type='hidden' name='controller' value='TipoSpecializzazioni'>
                        <input type='submit' value='Inserisci'>
                        </form> ";
            } else if ($actionButton=="save"){
                echo "<input type='hidden' name='action' value='update'>
                        <input type='hidden' name='idTipoSpecializzazione' value='".$idTipoSpecializzazione."'>
                        <input type='hidden' name='controller' value='TipoSpecializzazioni'>
                        <input type='submit' value='Salva Modifiche'>
                        </form> ";
            }
?>        
                
<table border=black>
	<thead>
    	<tr><th>idTipoSpecializzazione</th><th>nome</th><th>descrizione</th></tr>
    </thead>
    	<tbody>
        	<?php

                //print_r($listaTipoSpecializzazioni);
                $count = 0;
        		foreach($listaTipoSpecializzazioni as $tipoSpecializzazione){
                    echo "<tr>";
                    echo "<td>".$tipoSpecializzazione->getIdTipoSpecializzazione()."</td><td>".$tipoSpecializzazione->getNome()."</td><td>".$tipoSpecializzazione->getDescrizione()."</td>";
                    echo "<td><a href='index.php?action=delete&controller=TipoSpecializzazioni&idTipoSpecializzazione=".$tipoSpecializzazione->getIdTipoSpecializzazione()."'><button>Elimina</button></a>";
                    echo "<a href='index.php?action=modifica&controller=TipoSpecializzazioni&idTipoSpecializzazione=".$tipoSpecializzazione->getIdTipoSpecializzazione()."&nome=".$tipoSpecializzazione->getNome()."
                            &descrizione=".$tipoSpecializzazione->getDescrizione()."'><button>Modifica</button></a></td>";
                    echo "</tr>";
                }
        	?>
        </tbody>
</table>