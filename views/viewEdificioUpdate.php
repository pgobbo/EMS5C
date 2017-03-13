<?php 
	echo '<form action="index.php">
			<input type="text" name="codice" placeholder="Codice" value="'.$_GET['codice'].'" />
			<input type="text" name="nome" placeholder="Nome" value="'.$_GET['nome'].'" />
			<input type="number" name="idIstituto" placeholder="Id Istituto" value="'.$_GET['IdIstituto'].'" />
			<input type="hidden" name="IdEdificio" value="'.$_GET['IdEdificio'].'" />
			<input type="submit" value="Update" />
			<input type="hidden" name="controller" value="Edificio" />
			<input type="hidden" name="action" value="update" />
		</form>';
?>