<!--Form inserimento e modifica-->
<?php
    echo "
    <div class='content'>
    <form action='index.php' method='post'>
            userName:
            <input type='text' name='userName' value='".$userName."'>
            <br>
            password:
            <input type='password' name='password' value=''>
            <br>
            email:
            <input type='text' name='email' value='".$email."'>
            <br>";
            if($actionButton=="insert"){
                echo "<input type='hidden' name='action' value='add'>
                        <input type='hidden' name='controller' value='Utenti'>
                        <input type='submit' value='Inserisci'>
                        </form> ";
            } else if ($actionButton=="save"){
                echo "<input type='hidden' name='action' value='update'>
                        <input type='hidden' name='userName' value='".$userName."'>
                        <input type='hidden' name='controller' value='Utenti'>
                        <input type='submit' value='Salva Modifiche'>
                        </form> ";
            }
?>                     
<table border=green>
	<thead>
    	<th>userName</th><th>password</th><th>email</th>
    </thead>
    	<tbody>
        	<?php
        		foreach($listaUtenti as $utenti){
                    echo "<tr>";
                    echo "<td>".$utenti->getUserName()."</td><td>".$utenti->getPassword()."</td><td>".$utenti->getEmail()."</td>";
                    echo "<td><a href='index.php?action=delete&controller=Utenti&userName=".$utenti->getUserName()."'><button>Elimina</button></a>";
                    echo "<a href='index.php?action=modifica&controller=Utenti&userName=".$utenti->getUserName()."&email=".$utenti->getEmail()."'><button>Modifica</button></td></a>";                    
                    echo "</tr>";
                    echo "<br>";
                }
        	?>
        </tbody>
</table>
</div>