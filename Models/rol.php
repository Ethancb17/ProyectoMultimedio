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

    public static function save($usuario){
        try {
            $db=Db::getConnect();
            $insert=$db->prepare('INSERT INTO user VALUES(NULL, :IdPersonal, :FirtsName, :LastName, :Email, :UserNameAvatar, NULL, :IdRol, :CreatedAt, :UpdateAt, :EnabledUser )');//POSIBLES CAMBIOS
            $CreatedAt = date("Y-m-d h:i:s");
            $insert->bindValue('IdPersonal',$usuario->IdPersonal);
            $insert->bindValue('FirtsName',$usuario->FirtsName);
            $insert->bindValue('LastName',$usuario->LastName);
            $insert->bindValue('Email',$usuario->Email);
            $insert->bindValue('UserNameAvatar',$usuario->UserNameAvatar);
            $insert->bindValue('IdRol',$usuario->IdRol);
            $insert->bindValue('CreatedAt',$usuario->CreatedAt);
            $insert->bindValue('UpdateAt',$usuario->UpdateAt);
            $insert->bindValue('EnabledUser',$usuario->EnabledUser);
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
    public static function update($usuario){
		try {
			$db=Db::getConnect();
			$update=$db->prepare('UPDATE user SET IdPersonal=:IdPersonal, FirtsName=:FirtsName, LastName=:LastName, Email=:Email, UserNameAvatar=:UserNameAvatar, IdRol=:IdRol, EnabledUser=:EnabledUser WHERE IdUser=:IdUser');
			$update->bindValue('IdUser',$usuario->IdUser);
			$update->bindValue('IdPersonal',$usuario->IdPersonal);
			$update->bindValue('FirtsName',$usuario->FirtsName);
			$update->bindValue('LastName',$usuario->LastName);
			$update->bindValue('Email',$usuario->Email);
			$update->bindValue('UserNameAvatar',$usuario->UserNameAvatar);
			$update->bindValue('IdRol',$usuario->IdRol);
			$update->bindValue('EnabledUser',$usuario->EnabledUser);
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
	public static function delete($IdUser){	
		try {
			$db=Db::getConnect();
			$delete=$db->prepare('DELETE FROM user WHERE IdUser=:IdUser');
			$delete->bindValue('IdUser',$IdUser);
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
	public static function getById($IdUser){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM user WHERE IdUser=:IdUser');
		$select->bindValue('IdUser',$IdUser);
		$select->execute();
		$usuarioDb=$select->fetch();
		$usuario= new Usuario( $usuarioDb['IdUser'], $usuarioDb['IdPersonal'], $usuarioDb['FirtsName'], $usuarioDb['LastName'], $usuarioDb['Email'], $usuarioDb['UserNameAvatar'], $usuarioDb['IdRol'], $usuarioDb['EnabledUser'], $usuarioDb['CreatedAt'], $usuarioDb['UpdateAt'] );
		return $usuario;
	}
}
?>