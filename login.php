
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <?php include 'Views/head.php'?> 
  <link rel="stylesheet" href="Views/css/login.css">
</head>
<body>
<?php include 'Views/navLogin.php'?> 
<!-- CAMBIAR A....
    <div class="custom-control custom-checkbox">
      <input type="checkbox" class="custom-control-input" id="customCheck1">
      <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
    </div>
-->
<div class="container">
  <div class="abs-center">
    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <strong>Iniciar Sesión</strong>
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <form action="Controllers/login_controller.php" class="form" method="post">
              <input type='hidden' name='action' value='consultar'>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Ingrese el nombre de usuario" name="user" required>
                <label for="floatingInput">Nombre de usuario</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Ingrese la contraseña" name="pswd" required>
                <label for="floatingPassword">Contraseña</label>
              </div>
              <div class="form-group form-check mb-3">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="remember"> 
                  <a href="https://www.youtube.com/watch?v=_W-RPnIPRvs">Recuérdame</a> 
                </label>
              </div>
              <div class="form-group form-check mb-3">
                <a href="" data-toggle="modal" data-target="#exampleModal">Recuperar Contraseña</a>
              </div>
              <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
            </form>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <strong>Crear Usuario</strong>
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <form action="Controllers/usuario_controller.php" class="form" method="post">
              <input type='hidden' name='action' value='new'>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingPassword" placeholder="Ingrese" name="IdPersonal" required>
                <label for="floatingPassword">IdPersonal</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingPassword" placeholder="Ingrese" name="FirtsName" required>
                <label for="floatingPassword">Firts Name</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingPassword" placeholder="Ingrese" name="LastName" required>
                <label for="floatingPassword">Last Name</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingPassword" placeholder="Ingrese" name="Email" required>
                <label for="floatingPassword">Email</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Ingrese" name="UserNameAvatar" required>
                <label for="floatingInput">Nombre de usuario</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Ingrese la contraseña" name="Pass" required>
                <label for="floatingPassword">Contraseña</label>
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
              <!--
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="form-control custom-control-input"  id="customCheck1" name="EnabledUser">
                <label class="custom-control-label" for="customCheck1">Enabled User</label>
              </div>-->
              <input type='hidden' name='EnabledUser' value='1'>
              <button type="submit" class="btn btn-primary">Crear Cuenta</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="Controllers/login_controller.php" class="form" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Recuperar Contraseña</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type='hidden' name='action' value='recuperar'>
            <input type="text" class="form-control" id="floatingPassword" placeholder="Ingrese la contraseña" name="Email" required>
            <label for="floatingPassword">Email</label>
          </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="summit" class="btn btn-primary">Recuperar</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php require_once('Views/footer.php'); ?>
</body>
</html>
