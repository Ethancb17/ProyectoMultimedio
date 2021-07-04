<?php 
	/**
	* Descripción: Controlador para la entidad usuario
	*/
	//Set Var
	class ControlController
	{
        public function __construct(){}

		public function index(){
			$controles=Control::all();
			require_once('Views/Controles/index.php'); 
		}
        public function register(){
            require_once('Views/Controles/register.php');
        }

        public function save( $control ){
            Control::save( $control );
            header( 'Location: ../index.php' );
        }

        public function update($control){
            Control::update($control);
            header('Location: ../index.php');
        }

        public function delete($id){
            require_once('../Models/control.php');
            Control::delete($id);
            header('Location: ../index.php');
        }
        
		public function error(){
            require_once('Views/Menu/error.php');
        }

    }

    //obtiene los datos del usuario desde la vista y redirecciona a RolController.php
	if (isset($_POST['action'])) {
		$controlController= new ControlController();
		//se añade el archivo usuario.php
		//require_once('../Models/usuario.php');
		
		//se añade el archivo para la conexion
		//require_once('../connection.php');
		
			$action = $_POST['action'];
			$NameControllerView = $_POST['NameControllerView'];
			$Enabled = $_POST['EnabledC'];
			
		if ( $_POST['action'] == 'register' ) {
			require_once('../Models/control.php');
			require_once('../connection.php');
			$control = new Control( null, $NameControllerView, null, null, $Enabled );
			$controlController->save($control);
		} elseif ( $_POST['action']=='update' ) {
			require_once('../Models/control.php');
			require_once('../connection.php');
            $IdController  = $_POST['IdController'];
			$control = new Control( $IdController , $NameControllerView, null, null, $Enabled );
			$controlController->update($control);
		}		
	}

	//se verifica que action esté definida
	if ( isset($_GET['action']) ) {
		if ( $_GET['action'] != 'register' &$_GET['action']!='index') {
			$controlController=new ControlController();
			//para eliminar
			if ($_GET['action']=='delete') {
				require_once('../connection.php');		
				$controlController->delete($_GET['id']);
			} elseif ($_GET['action']=='update') {//mostrar la vista update con los datos del registro actualizar
				require_once('connection.php');
				require_once('Models/control.php');				
				$control=Control::getById($_GET['id']);						
				require_once('Views/Controles/update.php');
			}	
		}	
	}
	
?>