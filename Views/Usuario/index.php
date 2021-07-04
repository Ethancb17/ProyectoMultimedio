<h2>Lista de Usuarios</h2>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="myInput" placeholder="Ingresa el dato que deseas buscar">
    <label for="myInput">Ingresa el dato que deseas buscar</label>
</div>
<table class="table " id="myTable" name="myTable">
	<thead class="thead-dark">
		<th>IdUser</th>
		<th>IdPersonal</th>
		<th>FirtsName</th>
		<th>LastName</th>
		<th>Email</th>
		<th>UserNameAvatar</th>
		<th>IdRol</th>
		<th>EnabledUser</th>		
		<th colspan=2 >Acciones</th>		
	</thead>
   <?php
	foreach ($usuarios as $usuario) { ?>		
			<tr>
				<td><?php echo $usuario->IdUser; ?></td>
				<td><?php echo $usuario->IdPersonal; ?></td>
				<td><?php echo $usuario->FirtsName;?></td>
				<td><?php echo $usuario->LastName;?></td>
				<td><?php echo $usuario->Email; ?></td>
				<td><?php echo $usuario->UserNameAvatar; ?></td>
				<td><?php echo $usuario->IdRol;?></td>
				<td><?php echo $usuario->EnabledUser;?></td>	
				<td><a href="?controller=usuario&action=update&id=<?php echo $usuario->IdUser ?>"><button type="button" class="btn btn-info">Actualizar</button></a> </td>

				<td><a href="Controllers/usuario_controller.php?action=delete&id=<?php echo $usuario->IdUser ?>"><button type="button" class="btn btn-danger">Eliminar</button></a></td>
			</tr>		
	<?php } ?>
</table>

<script type="text/javascript" src="../ProyectoMultimedio/Views/js/search.js"></script>
