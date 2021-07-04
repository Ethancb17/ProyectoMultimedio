<?php
/**
* Modelo para el acceso a la base de datos y funciones CRUD
*/
//require '../connection.php';
require 'gestionEA.php';
class Control
{
	//atributos
	public $IdController ;
	public $NameControllerView;
	public $CreatedAt;
	public $UpdateAt;
    public $Enabled;

	//constructor de la clase
	function __construct( $IdController, $NameControllerView, $CreatedAt,  $UpdateAt, $Enabled)
	{
		$this->IdController = $IdController;
		$this->NameControllerView = $NameControllerView;
		$this->Enabled = $Enabled;
		$this->CreatedAt = date("Y-m-d h:i:s");
		$this->UpdateAt = date("Y-m-d h:i:s");
	}


    public static function all(){
		$listaControl = [];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM controller');

		// carga en la $listaUsuarios cada registro desde la base de datos
		foreach ($sql->fetchAll() as $control) {
			$listaControl[]= new Control( $control['IdController'], $control['NameControllerView'], $control['CreatedAt'], $control['UpdatedAt'], $control['Enabled'] );
		}
		return $listaControl;
	}

    public static function save($control){
        try {
            $db=Db::getConnect();
            $insert=$db->prepare('INSERT INTO controller VALUES(NULL, :NameControllerView, :CreatedAt, :UpdateAt, :EnabledC)');
            $insert->bindValue('NameControllerView',$control->NameControllerView);
            $insert->bindValue('CreatedAt',$control->CreatedAt);
            $insert->bindValue('UpdateAt',$control->UpdateAt);
            $insert->bindValue('EnabledC',$control->Enabled);
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
    public static function update($control){
		try {
			$db=Db::getConnect();
			$update=$db->prepare('UPDATE controller SET NameControllerView=:NameControllerView, Enabled=:Enabled WHERE IdController=:IdController');
			$update->bindValue('IdController',$control->IdController );
			$update->bindValue('NameControllerView',$control->NameControllerView);
			$update->bindValue('Enabled',$control->Enabled);
			var_dump($control);
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
	public static function delete($IdControl){	
		try {
			$db=Db::getConnect();
			$delete=$db->prepare('DELETE FROM controller WHERE IdController=:IdControl');
			$delete->bindValue('IdControl',$IdControl);
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
	public static function getById($IdControl){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM controller WHERE IdController=:IdControl');
		$select->bindValue('IdControl',$IdControl);
		$select->execute();
		$controlDb=$select->fetch();
		$control= new Control( $controlDb['IdController'], $controlDb['NameControllerView'], $controlDb['CreatedAt'], $controlDb['UpdatedAt'], $controlDb['Enabled']);
		return $control;
	}
}
?>