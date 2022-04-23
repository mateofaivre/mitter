<?php

class User {
	//	private $mail;
	//	private $username;
	//	private $firstname;
	//	private $lastname;
		private $datasUser;
	
	
	public function __construct() {
		//		$this->mail =
	}
	
	public function setUsersDatas( $dbh, $idUser ) {
		$stmtUser  = $dbh->prepare( "SELECT emailUser, nomUser, prenomUser, username, date_birth, avatar, active, biography, location, gender, date_creation, date_connexion, date_modification, website_link, passwordUser FROM user WHERE idUser = '$idUser' 	 " );
		$this->datasUser = $stmtUser->execute();
		$this->datasUser = $stmtUser->fetch();
	}
	
	public function getUsersDatas() {
		return $this->datasUser;
	}
	
}