<?php

require '../Models/login.php';

//Set Vars
$action = $_POST['action'];
$user = $_POST['user'];
$pswd = $_POST['pswd'];

	class LoginController
	{
		public function __construct(){}

		public function consultarclave( string $user, string $pswd  ){
				$usuarios = Login::consultarClave( $user, $pswd );					
				echo '<script type="text/javascript">
							alert("'.$usuarios.'");
							window.location.href="../login.php";
					  </script>';
		}

		public function recuperar(){
				echo '<script type="text/javascript">alert("recuperar clave!");</script>';
		}
	}
	
	if ( $action == 'consultar' ) {	
		$usuarioController = new LoginController();
		$usuarioController->consultarclave( $user, $pswd );
	}else if ( $action == 'recuperar' ){
		$usuarioController = new LoginController();
		$usuarioController->recuperar();
	}

?>