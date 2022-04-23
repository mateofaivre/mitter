<?php
require_once( $_SERVER[ 'DOCUMENT_ROOT' ] .  "/app/components/utils/load-classes/load-classes.php" );

$database = new Database("mitter", "localhost", "root", "9#G*UUi*cQ4b");
$dbh = $database->loginToDatabase();

print_r($_POST);
$login = new Login();
$login->login($dbh, $_POST['login_email'], $_POST['login_password']); ?>