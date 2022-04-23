<?php

class Database {
	public $name;
	public $host;
	public $username;
	public $password;
	
	public function __construct($var1, $var2, $var3, $var4) {
		$this->name = $var1;
		$this->host = $var2;
		$this->username = $var3;
		$this->password = $var4;
	}
	
	public function loginToDatabase() {
		try {
			$options = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );
//			echo 'login to db';
			return $dbh     = new PDO ( 'mysql:host=' . $this->host . ';dbname=' . $this->name . ';charset=utf8', $this->username, $this->password, $options );
		} catch ( PDOException $e ) {
			print "erreur !: " . $e->getMessage() . "<br/>";
			die();
		}
	}
}