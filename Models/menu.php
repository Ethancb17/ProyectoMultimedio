<?php
/**
* Modelo para el acceso a la base de datos y funciones CRUD
*/
//require '../connection.php';
require 'gestionEA.php';
class Menu
{
	//atributos
	public $IdMenu;
	public $NameMenu;
	public $IdCatalogoMenu;
	public $CreatedAt;
	public $UpdateAt;
    public $Enabled;

	//constructor de la clase
	function __construct( $IdMenu, $NameMenu, $IdCatalogoMenu, $CreatedAt,  $UpdateAt, $Enabled)
	{
		$this->IdMenu = $IdMenu;
		$this->NameMenu = $NameMenu;
		$this->IdCatalogoMenu = $IdCatalogoMenu;
		$this->Enabled = $Enabled;
		$this->CreatedAt = date("Y-m-d h:i:s");
		$this->UpdateAt = date("Y-m-d h:i:s");
	}


    public static function all(){
		$listaMenus = [];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM menu');

		// carga en la $listaUsuarios cada registro desde la base de datos
		foreach ($sql->fetchAll() as $menu) {
			$listaMenus[]= new Menu( $menu['IdMenu'], $menu['NameMenu'], $menu['IdCatalogoMenu'], $menu['CreatedAt'], $menu['UpdatedAt'], $menu['Enabled'] );
		}
		return $listaMenus;
	}

    public static function save($menu){
        try {
            $db=Db::getConnect();
            $insert=$db->prepare('INSERT INTO menu VALUES(NULL, :NameMenu, :IdCatalogoMenu, :CreatedAt, :UpdateAt, :EnabledM)');
            $insert->bindValue('NameMenu',$menu->NameMenu);
            $insert->bindValue('IdCatalogoMenu',$menu->IdCatalogoMenu);
            $insert->bindValue('CreatedAt',$menu->CreatedAt);
            $insert->bindValue('UpdateAt',$menu->UpdateAt);
            $insert->bindValue('EnabledM',$menu->Enabled);
            $insert->execute();
        } catch(Exception $ex) {

            $code = $ex->getCode();
            $message = $ex->getMessage();
            $file = $ex->getFile();
            $line = $ex->getLine();
            $messagecomplet = "Exception thrown in $file on line $line: [Code $code] $message";			
            GestionEA::saveErrores($messagecomplet, $file, $line);
            $result = "Surgio un error inesperado contacta al administrador";
        }					
    }

    //FALTA ACTUALIZAR CON TODOS LOS DATOS DE AQUI EN ADELANTE
    public static function update($menu){
		try {
			$db=Db::getConnect();
			$update=$db->prepare('UPDATE menu SET NameMenu=:NameMenu, IdCatalogoMenu=:IdCatalogoMenu, Enabled=:Enabled WHERE IdMenu=:IdMenu');
			$update->bindValue('IdMenu',$menu->IdMenu);
			$update->bindValue('NameMenu',$menu->NameMenu);
			$update->bindValue('IdCatalogoMenu',$menu->IdCatalogoMenu);
			$update->bindValue('Enabled',$menu->Enabled);
			$update->execute();
		} catch(Exception $ex) {
			$code = $ex->getCode();
			$message = $ex->getMessage();
			$file = $ex->getFile();
			$line = $ex->getLine();
			$messagecomplet = "Exception thrown in $file on line $line: [Code $code] $message";			
			GestionEA::saveErrores($messagecomplet, $file, $line);
			$result = "Surgio un error inesperado contacta al administrador";
		}
	}

	// la función para eliminar por el id
	public static function delete($IdMenu){	
		try {
			$db=Db::getConnect();
			$delete=$db->prepare('DELETE FROM menu WHERE IdMenu=:IdMenu');
			$delete->bindValue('IdMenu',$IdMenu);
			$delete->execute();
		} catch(Exception $ex) {
			$code = $ex->getCode();
			$message = $ex->getMessage();
			$file = $ex->getFile();
			$line = $ex->getLine();
			$messagecomplet = "Exception thrown in $file on line $line: [Code $code] $message";			
			GestionEA::saveErrores($messagecomplet, $file, $line);
			$result = "Surgio un error inesperado contacta al administrador";
		}
	}

	//la función para obtener un usuario por el id
	public static function getById($IdMenu){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM menu WHERE IdMenu=:IdMenu');
		$select->bindValue('IdMenu',$IdMenu);
		$select->execute();
		$menuDb=$select->fetch();
		$menu= new Menu( $menuDb['IdMenu'], $menuDb['NameMenu'], $menuDb['IdCatalogoMenu'], $menuDb['CreatedAt'], $menuDb['UpdatedAt'], $menuDb['Enabled']);
		return $menu;
	}
}
?>