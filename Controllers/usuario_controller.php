<?php 
	/**
	* Descripción: Controlador para la entidad usuario
	*/
	//Set Var
	//require '../Models/usuario.php';


	class UsuarioController
	{
        public function __construct(){}
		
		public function index(){
			$usuarios=Usuario::all();
			require_once('Views/Usuario/index.php'); 
		}
        public function register(){
            require_once('Views/Usuario/register.php');
        }

        public function save( $usuario ){
            Usuario::save( $usuario );
            header( 'Location: ../index.php' );
        }
        public function new( $usuario ){
            $nuevoUsuario = Usuario::save( $usuario );
			echo '<script type="text/javascript">
						alert("'.$nuevoUsuario.'");
						window.location.href="../login.php";
					</script>';
            //header( 'Location: ../login.php' );
        }

        public function update($usuario){
            Usuario::update($usuario);
            header('Location: ../index.php');
        }

        public function delete($id){
            require_once('../Models/usuario.php');
            Usuario::delete($id);
            header('Location: ../index.php');
        }
        
		public function error(){
            require_once('Views/Usuario/error.php');
        }

    }

    //obtiene los datos del usuario desde la vista y redirecciona a UsuarioController.php
	if (isset($_POST['action'])) {
		$usuarioController= new UsuarioController();
		//se añade el archivo usuario.php
		//require_once('../Models/usuario.php');
		
		//se añade el archivo para la conexion
		//require_once('../connection.php');
		
			$action = $_POST['action'];
			$IdPersonal = $_POST['IdPersonal'];
			$FirtsName = $_POST['FirtsName'];
			$LastName = $_POST['LastName'];
			$Email = $_POST['Email'];
			$UserNameAvatar = $_POST['UserNameAvatar'];
			$IdRol = $_POST['IdRol'];
			$EnabledUser = $_POST['EnabledUser'];

		if ( $_POST['action'] == 'register' ) {
			require_once('../Models/usuario.php');
			require_once('../connection.php');
			$usuario = new Usuario( null, $IdPersonal, $FirtsName, $LastName, $Email, $UserNameAvatar, null,$IdRol, $EnabledUser,null,null );
			$usuarioController->save($usuario);
		} elseif ( $_POST['action']=='update' ) {
			require_once('../Models/usuario.php');
			require_once('../connection.php');
			//$usuario = new Usuario( null, $IdPersonal, $FirtsName, $LastName, $Email, $UserNameAvatar, $IdRol, $EnabledUser,null,null );
			$usuarioU = new Usuario($_POST['IdUser'],$_POST['IdPersonal'],$_POST['FirtsName'],$_POST['LastName'],$_POST['Email'],$_POST['UserNameAvatar'],null,$_POST['IdRol'],$_POST['EnabledUser'],null,null); //Posible error
			var_dump($usuarioU);
			$usuarioController->update($usuarioU);
		}elseif ( $_POST['action']=='new' ) {
			require_once('../Models/usuario.php');
			require_once('../connection.php');
			$Pass = $_POST['Pass'];
			$usuario = new Usuario( null, $IdPersonal, $FirtsName, $LastName, $Email, $UserNameAvatar, $Pass, $IdRol, $EnabledUser,null,null );
			$usuarioController->new($usuario);
		}		
	}

	//se verifica que action esté definida
	if ( isset($_GET['action']) ) {
		if ( $_GET['action'] != 'register' &$_GET['action']!='index') {
			$usuarioController=new UsuarioController();
			//para eliminar
			if ($_GET['action']=='delete') {
				require_once('../connection.php');		
				$usuarioController->delete($_GET['id']);
			} elseif ($_GET['action']=='update') {//mostrar la vista update con los datos del registro actualizar
				require_once('connection.php');
				require_once('Models/usuario.php');				
				$usuario=Usuario::getById($_GET['id']);						
				require_once('Views/Usuario/update.php');
			}	
		}	
	}
	
?>