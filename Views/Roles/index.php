<h2>Lista de Roles</h2>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="myInput" placeholder="Ingresa el dato que deseas buscar">
    <label for="myInput">Ingresa el dato que deseas buscar</label>
</div>

<table class="table " id="myTable" name="myTable">
	<thead class="thead-dark">
		<th>IdRol</th>
		<th>NameRol</th>
		<th>IdMenu</th>
		<th>Enabled</th>
		<th colspan=2 >Acciones</th>		
	</thead>
	<!--function __construct( $IdRol, $NameRol, $IdMenu, $CreatedAt,  $UpdateAt, $Enabled)-->
   <?php
	foreach ($roles as $rol) { ?>		
			<tr>
				<td><?php echo $rol->IdRol; ?></td>
				<td><?php echo $rol->NameRol; ?></td>
				<td><?php echo $rol->IdMenu;?></td>
				<td><?php echo $rol->Enabled;?></td>	
				<td><a href="?controller=usuario&action=update&id=<?php echo $rol->IdRol ?>"><button type="button" class="btn btn-info">Actualizar</button></a> </td>

				<td><a href="Controllers/usuario_controller.php?action=delete&id=<?php echo $rol->IdRol ?>"><button type="button" class="btn btn-danger">Eliminar</button></a></td>
			</tr>		
	<?php } ?>
</table>

<script type="text/javascript" src="../ProyectoMultimedio/Views/js/search.js"></script>
