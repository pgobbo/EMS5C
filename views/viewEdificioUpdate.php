<?php 
	echo '<form action="index.php" class="form-inline">
			<input type="text" class="form-control" name="codice" placeholder="Codice" value="'.$_GET['codice'].'" />
			<input type="text" class="form-control" name="nome" placeholder="Nome" value="'.$_GET['nome'].'" />
			<input type="number" class="form-control" name="idIstituto" placeholder="Id Istituto" value="'.$_GET['IdIstituto'].'" />
			<input type="hidden" class="form-control" name="IdEdificio" value="'.$_GET['IdEdificio'].'" />
			<input type="submit" class="btn btn-primary" value="Update" />
			<input type="hidden" name="controller" value="Edificio" />
			<input type="hidden" name="action" value="update" />
		</form>';
?>