<h2>Lista de Menu</h2>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="myInput" placeholder="Ingresa el dato que deseas buscar">
    <label for="myInput">Ingresa el dato que deseas buscar</label>
</div>

<table class="table " id="myTable" name="myTable">
	<thead class="thead-dark">
		<th>IdMenu</th>
		<th>NameMenu</th>
		<th>IdCatalogoMenu</th>
		<th>Enabled</th>
		<th colspan=2 >Acciones</th>		
	</thead>
   <?php
	foreach ($menus as $menu) { ?>		
			<tr>
				<td><?php echo $menu->IdMenu; ?></td>
				<td><?php echo $menu->NameMenu; ?></td>
				<td><?php echo $menu->IdCatalogoMenu;?></td>
				<td><?php echo $menu->Enabled;?></td>	
				<td><a href="?controller=menu&action=update&id=<?php echo $menu->IdMenu ?>"><button type="button" class="btn btn-info">Actualizar</button></a> </td>
				<td><a href="Controllers/menu_controller.php?action=delete&id=<?php echo $menu->IdMenu ?>"><button type="button" class="btn btn-danger">Eliminar</button></a></td>
			</tr>		
	<?php } ?>
</table>

<script type="text/javascript" src="../ProyectoMultimedio/Views/js/search.js"></script>
