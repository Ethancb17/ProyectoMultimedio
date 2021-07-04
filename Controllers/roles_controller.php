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

    //obtiene los datos del usuario desde la vista y redirecciona a RolController.php
	if (isset($_POST['action'])) {
		$rolController= new RolController();
		//se añade el archivo usuario.php
		//require_once('../Models/usuario.php');
		
		//se añade el archivo para la conexion
		//require_once('../connection.php');
		
			$action = $_POST['action'];
			$NameRol = $_POST['NameRol'];
			$IdMenu = $_POST['IdMenu'];
			$Enabled = $_POST['EnabledR'];
			
            //function __construct( $IdRol, $NameRol, $IdMenu, $CreatedAt,  $UpdateAt, $Enabled)
		if ( $_POST['action'] == 'register' ) {
			require_once('../Models/rol.php');
			require_once('../connection.php');
			$rol = new Rol( null, $NameRol, $IdMenu, null, null, $Enabled );
			$rolController->save($rol);
		} elseif ( $_POST['action']=='update' ) {
			require_once('../Models/rol.php');
			require_once('../connection.php');
            $IdRol = $_POST['IdRol'];
			$rol = new Rol( $IdRol, $NameRol, $IdMenu, null, null, $Enabled );
			$rolController->update($rol);
		}		
	}

	//se verifica que action esté definida
	if ( isset($_GET['action']) ) {
		if ( $_GET['action'] != 'register' &$_GET['action']!='index') {
			$rolController=new RolController();
			//para eliminar
			if ($_GET['action']=='delete') {
				require_once('../connection.php');		
				$rolController->delete($_GET['id']);
			} elseif ($_GET['action']=='update') {//mostrar la vista update con los datos del registro actualizar
				require_once('connection.php');
				require_once('Models/rol.php');				
				$rol=Rol::getById($_GET['id']);						
				require_once('Views/Roles/update.php');
			}	
		}	
	}
	
?>