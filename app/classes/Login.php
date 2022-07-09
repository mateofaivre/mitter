<?php
//mecanisme connexion recevoir id login, check login renvoyer boolean, check mdp

class Login {
	public function __construct() {
	
	}
	
	public function login( $dbh, $mail, $password ) {
		if ( empty( $password ) ) {
			echo 'empty password';
		} else {
			$stmt_login  = $dbh->prepare( "SELECT * FROM mtr_user WHERE passwordUser ='$password' AND emailUser = '$mail'	 " );
			$datas_login = $stmt_login->execute();
			$datas_login = $stmt_login->fetch();
			
			if ( $stmt_login->rowCount() == 1 ) {
				session_start();
				$_SESSION[ 'idUser' ]     = $datas_login[ "idUser" ];
				exit( header( "Location: /" ) );
			} else {
				echo "Votre identifiant est incorrect";
			}
			
		}
	}
	
	public function signup( $dbh, $mail, $password, $firstname, $lastname, $username ) {
		
		if ( empty( $password ) ) {
			echo 'empty password';
		} else {
			$date        = date( 'Y-m-d H:i:s' );
			$stmt_login  = $dbh->prepare( "INSERT INTO mtr_user (emailUser, nomUser, prenomUser, username, active, date_creation, passwordUser) VALUES ('$mail', '$firstname', '$lastname', '$username', '1', '$date' , '$password')" );
			$datas_login = $stmt_login->execute();
			
			if ( $stmt_login->rowCount() == 1 ) {
				//				echo 'user created';
				exit( header( "Location: /" ) );
			} else {
				echo "Une erreur est survenue";
			}
			
		}
	}
	
	public function checkLogin() {
		if ( isset( $_SESSION[ 'idUser' ] ) ) {
			return $login = true;
		} else {
			return $login = false;
		}
	}
	
}