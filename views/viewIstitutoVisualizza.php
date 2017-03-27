
<table class="table table-bordered">
    <tr>
        <th>Codice Istituto</th>
        <th>Nome Istituto</th>
    </tr>
    <?php

    foreach ($lista as $row) {
    	$idIstituto = $row -> getIdIstituto();
        $codice = $row -> getCodice();
        $nome = $row -> getNome();
        echo "<tr>";
        echo "<td>" . $codice . "</td>";
        echo "<td>" . $nome . "</td>";
        echo "<td><form method='get' action='index.php'>
                <input type='hidden' name='controller' value='Istituto'>
                <input type='hidden' name='action' value='delete'>
                <input type='hidden' name='idIstituto' value='". $idIstituto ."'>
                <input type='submit' value='delete' class='btn btn-danger'/>
            </form></td>";
        echo "<td>
            <form method='get' action='index.php'>
                    <input type='submit' value='Update' class='btn btn-info'>
                    <input type='hidden' name='idIstituto' value='".$row->getIdIstituto()."' >
                    <input type='hidden' name='codice' value='".$row->getCodice()."' >
                    <input type='hidden' name='nome' value='".$row->getNome()."' >
                    <input type='hidden' name='controller' value='Istituto'>
                    <input type='hidden' name='action' value='updateShow'>
                </form>
            </td>
        </tr>";
    }
    
    ?>
</table>
<br>
<form action="index.php">

    <input type="submit" class="btn btn-primary" value="Inserisci" >
    <input type="hidden" name="controller" value="Istituto" >
    <input type="hidden" name="action" value="add">
</form>
