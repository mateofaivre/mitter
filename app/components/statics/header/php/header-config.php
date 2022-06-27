<?php
if ( session_status() === PHP_SESSION_NONE ) {
	session_start();
}

$login = new Login();

if (basename( $_SERVER[ 'PHP_SELF' ] ) != "login.php" && basename( $_SERVER[ 'PHP_SELF' ] ) != "signup.php") {
	$login->checkLogin() != true ? exit( header( "Location: /app/components/pages/login/php/login.php" ) ) : "";
}
else {
	$login->checkLogin() == true ? exit(header("Location: /")) : "";
}

$database = new Database( "mitter", "localhost", "root", "9#G*UUi*cQ4b" );
$dbh      = $database->loginToDatabase();

require_once( $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/modules/core/Config.php" );

$config = Fateal\Config::getInstance();

?>