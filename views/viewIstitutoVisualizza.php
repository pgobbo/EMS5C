<!DOCTYPE html>
<html>
    <head>
        <title>Elenco istituti</title>
    </head>
    <body>
        <h1>Elenco istituti</h1>
        <?php
        echo "<p>Sono presenti " . count($lista) . " record</p>";
        ?>
        <table border="1">
            <tr>
                <th border="0">Id Istituto</th>
                <th>Codice Istituto</th>
                <th>Nome Istituto</th>
            </tr>
            <?php

            foreach ($lista as $row) {
                $idIstituto = $row -> getIdIstituto();
                $codice = $row -> getCodice();
                $nome = $row -> getNome();
                echo "<tr>";
                echo "<td>" . $idIstituto . "</td>";
                echo "<td>" . $codice . "</td>";
                echo "<td>" . $nome . "</td>";
                echo "<td><form method='get' action='index.php'>
                        <input type='hidden' name='controller' value='Istituto'>
                        <input type='hidden' name='action' value='delete'>
                        <input type='hidden' name='idIstituto' value='". $idIstituto ."'>
                        <input type='submit' value='delete'/>
                    </form></td>";
                echo "<td>
                    <form method='get' action='index.php'>
                            <input type='submit' value='Update'>
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
    </body>
</html>


