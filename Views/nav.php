<?php 
  function active( $currect_page ){
    $url_array = explode('/', $_SERVER['REQUEST_URI']);
    $url = end($url_array);
    if($currect_page == $url){
      echo 'active';
    }
  }
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Menu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Usuarios</a>
          <div class="dropdown-menu">
            <a class="dropdown-item <?php active('index.php?controller=usuario&action=register');?>" href="?controller=usuario&action=register">Crear Usuarios</a>
            <a class="dropdown-item <?php active('index.php?controller=usuario&action=index');?>" href="?controller=usuario&action=index">Ver Usuarios</a></td>
          </div>
        </li> 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Roles</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="?controller=usuario&action=register">Crear Rol</a>
            <a class="dropdown-item" href="?controller=usuario&action=index">Ver Rol</a></td>
          </div>
        </li>          
      </ul>
      <form class="form-inline">        
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Salir</button>
      </form>
    </div>
  </nav>