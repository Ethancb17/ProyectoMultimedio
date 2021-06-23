<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <?php include 'Views/head.php'?> 
</head>
<body>
<?php include 'Views/navLogin.php'?> 
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h2>Inicio de Sessió</h2>
    <form action="Controllers/login_controller.php" method="post">
      <input type='hidden' name='action' value='consultar'>
      <div class="form-group">
          <label class="display-4" for="text">Nombre de usuario:</label>
          <input type="text" class="form-control" id="user" placeholder="Ingrese el nombre de usuario" name="user" required>
      </div>
      <div class="form-group">
          <label class="display-4" for="pwd">Contraseña:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Ingrese la contraseña" name="pswd" required>
      </div>
      <div class="form-group form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="remember">Recuérdame 
        </label>
      </div>
      <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
    </form>
  </div>
</div>
</body>
</html>
