<?php

class GestionEA{

	private function __construct(){}

	public static function saveErrores( string $Sentencia, string $Controller, string $IdUser ){
		$CreatedAt = date("Y-m-d h:i:s");
		$db=Db::getConnect();	
		$insert=$db->prepare( 'INSERT INTO errores VALUES( NULL, :Sentencia, :Controller, :CreatedAt, :IdUser )');			
		$insert->bindValue( 'Sentencia', $Sentencia );
		$insert->bindValue( 'Controller', $Controller );
		$insert->bindValue( 'CreatedAt', $CreatedAt );
		$insert->bindValue( 'IdUser', $IdUser );
		$insert->execute();
	}	

	public static function saveAuditoria( string $Sentencia, string $Controller, string $IdUser ){
		$CreatedAt = date("Y-m-d h:i:s");
		$db=Db::getConnect();	
		$insert=$db->prepare( 'INSERT INTO auditoria VALUES( NULL, :Sentencia, :Controller, :CreatedAt, :IdUser )');			
		$insert->bindValue( 'Sentencia', $Sentencia );
		$insert->bindValue( 'Controller', $Controller );
		$insert->bindValue( 'CreatedAt', $CreatedAt );
		$insert->bindValue( 'IdUser', $IdUser );
		$insert->execute();
	}					
}
?>