<h1>Bienvenido al update Control..!</h1>
<form action='Controllers/control_controller.php' method='post'>
	<input type='hidden' name='action' value='update'>
    <div class="form-floating mb-3">
      <input type="hidden" class="form-control" id="IdController" name="IdController" value="<?php echo $control->IdController; ?>">
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="Ingrese" name="NameControllerView" required value="<?php echo $control->NameControllerView; ?>">
      <label for="floatingInput">Nombre Control</label>
    </div>
    <div class="custom-control custom-checkbox mb-3">
      <input type="checkbox" class="form-control custom-control-input" id="customCheck1" name="EnabledC">
      <label class="custom-control-label" for="customCheck1">Enabled Control</label>
    </div>
	<input type='submit' value='Guardar' class="btn btn-success">
</form>