<h1>Bienvenido al register menu..!</h1>
<form action='Controllers/menu_controller.php' method='post'>
	<input type='hidden' name='action' value='register'>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="Ingrese" name="NameMenu" required>
      <label for="floatingInput">Nombre Menu</label>
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Id Catalogo Menu</label>
      </div>
      <select class="custom-select" id="inputGroupSelect01" name="IdCatalogoMenu" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>
    </div>
    <div class="custom-control custom-checkbox mb-3">
      <input type="checkbox" class="form-control custom-control-input" id="customCheck1" name="EnabledM">
      <label class="custom-control-label" for="customCheck1">Enabled Rol</label>
    </div>
             		
	<input type='submit' value='Guardar' class="btn btn-success">
</form>