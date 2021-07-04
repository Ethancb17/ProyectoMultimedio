<?php
/**
* Modelo para el acceso a la base de datos y funciones CRUD
*/
//require '../connection.php';
require 'gestionEA.php';
class Rol
{
	//atributos
	public $IdRol;
	public $NameRol;
	public $IdMenu;
	public $CreatedAt;
	public $UpdateAt;
    public $Enabled;

	//constructor de la clase
	function __construct( $IdRol, $NameRol, $IdMenu, $CreatedAt,  $UpdateAt, $Enabled)
	{
		$this->IdRol = $IdRol;
		$this->NameRol = $NameRol;
		$this->IdMenu = $IdMenu;
		$this->Enabled = $Enabled;
		$this->CreatedAt = date("Y-m-d h:i:s");
		$this->UpdateAt = date("Y-m-d h:i:s");
	}


    public static function all(){
		$listaRoles = [];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM roles');

		// carga en la $listaUsuarios cada registro desde la base de datos
		foreach ($sql->fetchAll() as $rol) {
			$listaRoles[]= new Rol( $rol['IdRol'], $rol['NameRol'], $rol['IdMenu'], $rol['CreatedAt'], $rol['UpdateAt'], $rol['Enabled'] );
		}
		return $listaRoles;
	}

    public static function save($rol){
        try {
            $db=Db::getConnect();
            $insert=$db->prepare('INSERT INTO roles VALUES(NULL, :NameRol, :IdMenu, :CreatedAt, :UpdateAt, :EnabledR)');
            $insert->bindValue('NameRol',$rol->NameRol);
            $insert->bindValue('IdMenu',$rol->IdMenu);
            $insert->bindValue('CreatedAt',$rol->CreatedAt);
            $insert->bindValue('UpdateAt',$rol->UpdateAt);
            $insert->bindValue('EnabledR',$rol->Enabled);
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
    public static function update($rol){
		try {
			$db=Db::getConnect();
			$update=$db->prepare('UPDATE roles SET NameRol=:NameRol, NameRol=:NameRol, IdMenu=:IdMenu, Enabled=:Enabled WHERE IdRol=:IdRol');
			$update->bindValue('IdRol',$rol->IdRol);
			$update->bindValue('NameRol',$rol->NameRol);
			$update->bindValue('IdMenu',$rol->IdMenu);
			$update->bindValue('Enabled',$rol->Enabled);
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
	public static function delete($IdRol){	
		try {
			$db=Db::getConnect();
			$delete=$db->prepare('DELETE FROM roles WHERE IdRol=:IdRol');
			$delete->bindValue('IdRol',$IdRol);
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
	public static function getById($IdRol){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM roles WHERE IdRol=:IdRol');
		$select->bindValue('IdRol',$IdRol);
		$select->execute();
		$rolDb=$select->fetch();
		$rol= new Rol( $rolDb['IdRol'], $rolDb['NameRol'], $rolDb['IdMenu'], $rolDb['CreatedAt'], $rolDb['UpdateAt'], $rolDb['Enabled']);
		//	$listaRoles[]= new Rol( $rol['IdRol'], $rol['NameRol'], $rol['IdMenu'], $rol['CreatedAt'], $rol['UpdateAt'], $rol['Enabled'] );
			
		return $rol;
	}
}
?>