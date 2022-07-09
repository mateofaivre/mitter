<?php
require_once( $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/components/statics/header/php/header.php" );

if ( isset( $_FILES ) ) {
	require_once( $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/components/utils/upload-file/php/upload-file.php" );
} else {
	$filesName = NULL;
}


$meet = new Meet();
$meet->setMeetToPublish( $dbh, $_SESSION[ "idUser" ], $_POST[ "meet_text" ], $filesName );
$meetToPublish = $meet->getMeetToPublish();

exit( header( "Location: index.php" ) );
