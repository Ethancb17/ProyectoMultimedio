<h1>Bienvenido al register usuario..!</h1>

<form action='Controllers/usuario_controller.php' method='post'>
	<input type='hidden' name='action' value='register'>
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
        <span class="input-group-text">User Name Avatar</span>
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
	<input type='submit' value='Guardar' class="btn btn-success">
</form>
