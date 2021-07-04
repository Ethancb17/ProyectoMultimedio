<h1>Bienvenido al update usuario..!</h1>
<form action='Controllers/usuario_controller.php' method='post'>
	<input type='hidden' name='action' value='update'>
    <div class="form-floating mb-3">
      <input type="hidden" class="form-control" id="IdUser" name="IdUser" value="<?php echo $usuario->IdUser; ?>">
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" name="IdPersonal" value="<?php echo $usuario->IdPersonal; ?>">
      <label for="floatingInput">IdPersonal</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" name="FirtsName" value="<?php echo $usuario->FirtsName; ?>">
      <label for="floatingInput">Firts Name</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" name="LastName" value='<?php echo $usuario->LastName; ?>'>
      <label for="floatingInput">Last Name</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" name="Email" value='<?php echo $usuario->Email; ?>'>
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" name="UserNameAvatar" value='<?php echo $usuario->UserNameAvatar; ?>'>
      <label for="floatingInput">UserName Avatar</label>
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Id Rol</label>
      </div>
      <select class="custom-select" id="inputGroupSelect01" name="IdRol">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>
    </div>
    <div class="custom-control custom-checkbox mb-3">
      <input type="checkbox" class="form-control custom-control-input" value="1" id="customCheck1" name="EnabledUser">
      <label class="custom-control-label" for="customCheck1">Enabled User</label>
    </div>
	<input type='submit' value='Actualizar' class="btn btn-success">
</form>