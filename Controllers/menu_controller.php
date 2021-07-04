<?php 
	/**
	* Descripción: Controlador para la entidad usuario
	*/
	//Set Var
	class MenuController
	{
        public function __construct(){}

		public function index(){
			$menus=Menu::all();
			require_once('Views/Menu/index.php'); 
		}
        public function register(){
            require_once('Views/Menu/register.php');
        }

        public function save( $menu ){
            Menu::save( $menu );
            header( 'Location: ../index.php' );
        }

        public function update($menu){
            Menu::update($menu);
            header('Location: ../index.php');
        }

        public function delete($id){
            require_once('../Models/menu.php');
            Menu::delete($id);
            header('Location: ../index.php');
        }
        
		public function error(){
            require_once('Views/Menu/error.php');
        }

    }

    //obtiene los datos del usuario desde la vista y redirecciona a RolController.php
	if (isset($_POST['action'])) {
		$menuController= new MenuController();
		//se añade el archivo usuario.php
		//require_once('../Models/usuario.php');
		
		//se añade el archivo para la conexion
		//require_once('../connection.php');
		
			$action = $_POST['action'];
			$NameMenu = $_POST['NameMenu'];
			$IdCatalogoMenu = $_POST['IdCatalogoMenu'];
			$Enabled = $_POST['EnabledM'];
			
            //function __construct( $IdRol, $NameRol, $IdMenu, $CreatedAt,  $UpdateAt, $Enabled)
		if ( $_POST['action'] == 'register' ) {
			require_once('../Models/menu.php');
			require_once('../connection.php');
			$menu = new Menu( null, $NameMenu, $IdCatalogoMenu, null, null, $Enabled );
			$menuController->save($menu);
		} elseif ( $_POST['action']=='update' ) {
			require_once('../Models/menu.php');
			require_once('../connection.php');
            $IdMenu = $_POST['IdMenu'];
			$menu = new Menu( $IdMenu, $NameMenu, $IdCatalogoMenu, null, null, $Enabled );
			$menuController->update($menu);
		}		
	}

	//se verifica que action esté definida
	if ( isset($_GET['action']) ) {
		if ( $_GET['action'] != 'register' &$_GET['action']!='index') {
			$menuController=new MenuController();
			//para eliminar
			if ($_GET['action']=='delete') {
				require_once('../connection.php');		
				$menuController->delete($_GET['id']);
			} elseif ($_GET['action']=='update') {//mostrar la vista update con los datos del registro actualizar
				require_once('connection.php');
				require_once('Models/menu.php');				
				$menu=Menu::getById($_GET['id']);						
				require_once('Views/Menu/update.php');
			}	
		}	
	}
	
?>