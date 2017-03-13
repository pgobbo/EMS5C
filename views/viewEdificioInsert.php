<?php 
	echo '<form action="index.php">
			<input type="text" name="codice" placeholder="Codice" />
			<input type="text" name="nome" placeholder="Nome" />
			<input type="number" name="idIstituto" placeholder="Id Istituto" />
			<input type="submit" value="Submit" />
			<input type="hidden" name="controller" value="Edificio" />
			<input type="hidden" name="action" value="add" />
		</form>';
 ?>