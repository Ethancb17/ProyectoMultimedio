<h1>Bienvenido al register usuario..!</h1>
<!-- CAMBIAR A....
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Ingrese la contraseña" name="pswd" required>
      <label for="floatingPassword">Contraseña</label>
    </div>
    <div class="custom-control custom-checkbox">
      <input type="checkbox" class="custom-control-input" id="customCheck1">
      <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
    </div>
-->
<form action='Controllers/usuario_controller.php' method='post'>
	<input type='hidden' name='action' value='register'>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingPassword" placeholder="Ingrese la contraseña" name="IdPersonal" required>
      <label for="floatingPassword">IdPersonal</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingPassword" placeholder="Ingrese la contraseña" name="FirtsName" required>
      <label for="floatingPassword">Firts Name</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingPassword" placeholder="Ingrese la contraseña" name="LastName" required>
      <label for="floatingPassword">Last Name</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingPassword" placeholder="Ingrese la contraseña" name="Email" required>
      <label for="floatingPassword">Email</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingPassword" placeholder="Ingrese la contraseña" name="UserNameAvatar" required>
      <label for="floatingPassword">UserName Avatar</label>
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Id Rol</label>
      </div>
      <select class="custom-select" id="inputGroupSelect01" name="IdRol" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>
    </div>
    <div class="custom-control custom-checkbox mb-3">
      <input type="checkbox" class="form-control custom-control-input"  id="customCheck1" name="EnabledUser">
      <label class="custom-control-label" for="customCheck1">Enabled User</label>
    </div>
             		
	<input type='submit' value='Guardar' class="btn btn-success">
</form>

<!--
      <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Id Personal</span>
      </div>
      <input type="text" class="form-control" id="IdPersonal" name="IdPersonal" required="">
    </div>	
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Firts Name</span>
      </div>
      <input type="text" class="form-control" id="FirtsName" name="FirtsName" required="">
    </div>	
	<div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Last Name</span>
      </div>
      <input type="text" class="form-control" id="LastName" name="LastName" required="">
    </div>	
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Email</span>
      </div>
      <input type="email" class="form-control" id="Email" name="Email" required="">
    </div>	
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">UserName Avatar</span>
      </div>
      <input type="text" class="form-control" id="UserNameAvatar" name="UserNameAvatar" required="">
    </div>	
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Id Rol</span>
      </div>
        <select class="form-control" id="IdRol" name="IdRol" required="">
		    <option>1</option>
		    <option>2</option>
		    <option>3</option>
		    <option>4</option>
		 </select>
    </div>	
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Enabled User</span>
      </div>
     	<input class="form-control" type="checkbox" value="1" id="EnabledUser" name="EnabledUser" required="">
    </div>	  
-->
