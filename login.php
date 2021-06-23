<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <?php include 'Views/head.php'?> 
  <link rel="stylesheet" href="Views/css/login.css">
</head>
<body>
<?php include 'Views/navLogin.php'?> 

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
              <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Ingrese la contraseña" name="pswd" required>
                <label for="floatingPassword">Contraseña</label>
              </div>
              <br>
              <div class="form-group form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="remember">Recuérdame 
                </label>
              </div>
              <br>
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
            <form action="Controllers/login_controller.php" class="form" method="post">
              <input type='hidden' name='action' value='consultar'>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Ingrese el nombre de usuario" name="user" required>
                <label for="floatingInput">Nombre de usuario</label>
              </div>
              <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Ingrese la contraseña" name="pswd" required>
                <label for="floatingPassword">Contraseña</label>
              </div>
              <br>
              <button type="submit" class="btn btn-primary">Crear Cuenta</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once('Views/footer.php'); ?>
</body>
</html>