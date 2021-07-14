<?php

require '../Models/login.php';

//Set Vars
$action = $_POST['action'];


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

		public function recuperar(string $mail){
				$recuperacion = Login::recuperarContrasenia($mail);
				echo '<script type="text/javascript">
						alert("'.$recuperacion.'");
						window.location.href="../login.php";
					</script>';
				//echo '<script type="text/javascript">alert("recuperar clave!");</script>';
		}
	}
	
	if ( $action == 'consultar' ) {	
		$user = $_POST['user'];
		$pswd = $_POST['pswd'];
		$usuarioController = new LoginController();
		$usuarioController->consultarclave( $user, $pswd );
	}else if ( $action == 'recuperar' ){
		$mail = $_POST['Email'];
		$usuarioController = new LoginController();
		$usuarioController->recuperar($mail);
	}

?>