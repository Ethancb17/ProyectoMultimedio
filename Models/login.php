<?php
/**
* Modelo para el acceso a la base de datos y funciones CRUD
*/
session_start();
require '../connection.php';
require 'gestionEA.php';
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Login{
	//atributos
	public $UserNameAvatar;
	public $Password;
	public $IdRol;	

	//constructor de la clase
	function __construct( $UserNameAvatar, $Password, $IdRol, $EnabledUser ){
		$this->UserNameAvatar = $UserNameAvatar;
		$this->Password = $Password;
		$this->IdRol = $IdRol; 
		$this->EnabledUser = $EnabledUser;
	}
	//función para obtener la autenticacion del usuario
	public static function consultarClave( string $user, string $pswd ){	
		$result = "";
		try {
			$db = Db::getConnect();		
			$sqlprepared = 'SELECT UserNameAvatar, Password, EnabledUser, IdRol FROM user WHERE UserNameAvatar = :user AND `Password`=:pswd AND `EnabledUser`=1' ;
			$select = $db->prepare($sqlprepared);

			//$pswd = hash( 'ripemd160', $pswd );
			$select->bindValue( 'user', $user );
			$select->bindValue( 'pswd', $pswd );

			$select->execute();
			//asignarlo al objeto 
			$UserDb = $select->fetch();
			//$login= new Login( $UserDb['UserNameAvatar'], $UserDb['Password'], $UserDb['IdRol'], $UserDb['EnabledUser'] );					
			if ( $UserDb === false ){
				$result = "Datos equivocados vuelva ingresar usuario y clave";				
			}else{
				$_SESSION['UserNameAvatar'] = $UserDb['UserNameAvatar'];
				$_SESSION['IdRol'] = $UserDb['IdRol'];
				$_SESSION['EnabledUser'] = $UserDb['EnabledUser'];
				header( 'Location: ../index.php' );
			}					
		} catch(Exception $ex) {
			$code = $ex->getCode();
			$message = $ex->getMessage();
			$file = $ex->getFile();
			$line = $ex->getLine();
			$messagecomplet = "Exception thrown in $file on line $line: [Code $code] $message";			
			GestionEA::saveErrores($messagecomplet, $file, $user);
			$result = "Surgio un error inesperado contacta al administrador";
		}			
		return $result ;
	}
	public static function crearUsuario( string $user, string $pswd ){	
		$result = "";
		try {
			// $db = Db::getConnect();		
			// $sqlprepared = 'SELECT UserNameAvatar, Password, EnabledUser, IdRol FROM user WHERE UserNameAvatar = :user AND `Password`=:pswd AND `EnabledUser`=1' ;
			// $select = $db->prepare($sqlprepared);

			// //$pswd = hash( 'ripemd160', $pswd );
			// $select->bindValue( 'user', $user );
			// $select->bindValue( 'pswd', $pswd );

			// $select->execute();
			// //asignarlo al objeto 
			// $UserDb = $select->fetch();
			// //$login= new Login( $UserDb['UserNameAvatar'], $UserDb['Password'], $UserDb['IdRol'], $UserDb['EnabledUser'] );					
			// if ( $UserDb === false ){
			// 	$result = "Datos equivocados vuelva ingresar usuario y clave";				
			// }else{
			// 	$_SESSION['UserNameAvatar'] = $UserDb['UserNameAvatar'];
			// 	$_SESSION['IdRol'] = $UserDb['IdRol'];
			// 	$_SESSION['EnabledUser'] = $UserDb['EnabledUser'];
			// 	header( 'Location: ../index.php' );
			// }					
		} catch(Exception $ex) {
			$code = $ex->getCode();
			$message = $ex->getMessage();
			$file = $ex->getFile();
			$line = $ex->getLine();
			$messagecomplet = "Exception thrown in $file on line $line: [Code $code] $message";			
			GestionEA::saveErrores($messagecomplet, $file, $user);
			$result = "Surgio un error inesperado contacta al administrador";
		}			
		return $result ;
	}
	public static function recuperarContrasenia(){	
		$result = "";
		try {
			// $db = Db::getConnect();		
			// $sqlprepared = 'SELECT UserNameAvatar, Password, EnabledUser, IdRol FROM user WHERE UserNameAvatar = :user AND `Password`=:pswd AND `EnabledUser`=1' ;
			// $select = $db->prepare($sqlprepared);

			// //$pswd = hash( 'ripemd160', $pswd );
			// $select->bindValue( 'user', $user );
			// $select->bindValue( 'pswd', $pswd );

			// $select->execute();
			// //asignarlo al objeto 
			// $UserDb = $select->fetch();
			// //$login= new Login( $UserDb['UserNameAvatar'], $UserDb['Password'], $UserDb['IdRol'], $UserDb['EnabledUser'] );					
			// if ( $UserDb === false ){
			// 	$result = "Datos equivocados vuelva ingresar usuario y clave";				
			// }else{
			// 	$_SESSION['UserNameAvatar'] = $UserDb['UserNameAvatar'];
			// 	$_SESSION['IdRol'] = $UserDb['IdRol'];
			// 	$_SESSION['EnabledUser'] = $UserDb['EnabledUser'];
			// 	header( 'Location: ../index.php' );
			// }	


			

			$oMail = new PHPMailer();
			$oMail->isSMTP();
			$oMail->Host="smtp.gmail.com";
			$oMail->Port=587;
			$oMail->SMTPSecure="tls";
			$oMail->SMTPAuth=true;
			$oMail->Username="RecoveryPassMultimedios@gmail.com";
			$oMail->Password="Ethancb01.";
			$oMail->setFrom("RecoveryPassMultimedios@gmail.com","Recuperacion de Cotraseña");
			$oMail->addAddress("RecoveryPassMultimedios@gmail.com","Ethan Cordero");
			$oMail->Subject="Recuperar contraseña del usuario";
			$oMail->msgHTML("Este es un mensaje de prueba");

			if(!$oMail->send()){
				$result = $oMail->ErrorInfo;
			}else{
				echo "SIUUUUUUUUUU";
			}

				
		} catch(Exception $ex) {
			$code = $ex->getCode();
			$message = $ex->getMessage();
			$file = $ex->getFile();
			$line = $ex->getLine();
			$messagecomplet = "Exception thrown in $file on line $line: [Code $code] $message";			
			GestionEA::saveErrores($messagecomplet, $file, $user);
			$result = "Surgio un error inesperado contacta al administrador";
		}			
		return $result ;
	}
}
?>


