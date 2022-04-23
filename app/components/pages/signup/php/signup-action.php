<?php
require_once( $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/components/utils/load-classes/load-classes.php" );

$database = new Database( "mitter", "localhost", "root", "9#G*UUi*cQ4b" );
$dbh      = $database->loginToDatabase();

$signup = new Login( $_POST[ 'email' ], $_POST[ 'password' ], $_POST[ 'firstname' ], $_POST[ 'lastname' ], $_POST[ 'username' ] );
$signup->signup( $dbh, $_POST[ 'email' ], $_POST[ 'password' ], $_POST[ 'firstname' ], $_POST[ 'lastname' ], $_POST[ 'username' ] ); ?>