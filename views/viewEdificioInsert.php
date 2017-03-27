<?php 
	echo '<form action="index.php" class="form-inline">
			<input type="text" name="codice" placeholder="Codice" class="form-control" />
			<input type="text" name="nome" placeholder="Nome" class="form-control" />
			<input type="number" name="idIstituto" placeholder="Id Istituto" class="form-control" />
			<input type="submit" class="btn btn-primary" value="Submit" class="btn btn-primary" />
			<input type="hidden" name="controller" value="Edificio" />
			<input type="hidden" name="action" value="add" />
		</form>';
 ?>