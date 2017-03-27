<?php
	echo '<table class="table table-bordered">
			<thead>
				<th>IdEdificio</th>
				<th>Codice</th>
				<th>Nome</th>
				<th>IdIstituto</th>
				<th>Remove</th>
				<th>Update</th>
			</thead>
			<tbody>';
	foreach($edifici as $edificio) {
		echo '<tr>
				<td>'.$edificio->getIdEdificio().'</td>
				<td>'.$edificio->getCodice().'</td>
				<td>'.$edificio->getNome().'</td>
				<td>'.$edificio->getIdIstituto().'</td>
				<td>
					<form action="index.php">
						<input type="submit" value="Delete" class="btn btn-danger" />
						<input type="hidden" name="IdEdificio" value="'.$edificio->getIdEdificio().'" />
						<input type="hidden" name="controller" value="Edificio" />
						<input type="hidden" name="action" value="delete" />
					</form>
				</td>
				<td>
					<form>
						<input type="submit" value="Update" class="btn btn-info" />
						<input type="hidden" name="IdEdificio" value="'.$edificio->getIdEdificio().'" />
						<input type="hidden" name="codice" value="'.$edificio->getCodice().'" />
						<input type="hidden" name="nome" value="'.$edificio->getNome().'" />
						<input type="hidden" name="IdIstituto" value="'.$edificio->getIdIstituto().'" />
						<input type="hidden" name="controller" value="Edificio" />
						<input type="hidden" name="action" value="updateShow" />
					</form>
				</td>
			</tr>';
	}
	echo '</tbody>
		</table>
		<form action="index.php">
			<input type="submit" class="btn btn-primary" value="Inserisci" >
			<input type="hidden" name="controller" value="Edificio" >
			<input type="hidden" name="action" value="addShow">
		</form>';
?>