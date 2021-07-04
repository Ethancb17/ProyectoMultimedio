<?php 
	/**
	* Descripción: Controlador para la entidad usuario
	*/
	//Set Var
	class RolController
	{
        public function __construct(){}

		public function index(){
			$roles=Rol::all();
			require_once('Views/Roles/index.php'); 
		}
        public function register(){
            require_once('Views/Roles/register.php');
        }

        public function save( $rol ){
            Rol::save( $rol );
            header( 'Location: ../index.php' );
        }

        public function update($rol){
            Rol::update($rol);
            header('Location: ../index.php');
        }

        public function delete($id){
            require_once('../Models/rol.php');
            Rol::delete($id);
            header('Location: ../index.php');
        }
        
		public function error(){
            require_once('Views/Roles/error.php');
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
			$usuario = new Usuario( null, $IdPersonal, $FirtsName, $LastName, $Email, $UserNameAvatar, $IdRol, $EnabledUser,null,null );
			$usuarioController->save($usuario);
		} elseif ( $_POST['action']=='update' ) {
			require_once('../Models/usuario.php');
			require_once('../connection.php');
			//$usuario = new Usuario( null, $IdPersonal, $FirtsName, $LastName, $Email, $UserNameAvatar, $IdRol, $EnabledUser,null,null );
			$usuarioU = new Usuario($_POST['IdUser'],$_POST['IdPersonal'],$_POST['FirtsName'],$_POST['LastName'],$_POST['Email'],$_POST['UserNameAvatar'],$_POST['IdRol'],$_POST['EnabledUser'],null,null); //Posible error
			var_dump($usuarioU);
			$usuarioController->update($usuarioU);
			
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