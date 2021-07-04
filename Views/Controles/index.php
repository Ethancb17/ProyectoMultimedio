<h2>Lista de Controles</h2>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="myInput" placeholder="Ingresa el dato que deseas buscar">
    <label for="myInput">Ingresa el dato que deseas buscar</label>
</div>

<table class="table " id="myTable" name="myTable">
	<thead class="thead-dark">
		<th>IdController </th>
		<th>NameControllerView</th>
		<th>Enabled</th>
		<th colspan=2 >Acciones</th>		
	</thead>
   <?php
	foreach ($controles as $control) { ?>		
			<tr>
				<td><?php echo $control->IdController; ?></td>
				<td><?php echo $control->NameControllerView; ?></td>
				<td><?php echo $control->Enabled;?></td>	
				<td><a href="?controller=control&action=update&id=<?php echo $control->IdController ?>"><button type="button" class="btn btn-info">Actualizar</button></a> </td>
				<td><a href="Controllers/control_controller.php?action=delete&id=<?php echo $control->IdController ?>"><button type="button" class="btn btn-danger">Eliminar</button></a></td>
			</tr>		
	<?php } ?>
</table>

<script type="text/javascript" src="../ProyectoMultimedio/Views/js/search.js"></script>
