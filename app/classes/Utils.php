<?php

class Utils {
	
	public function __construct( ) {
	
	}

	public function query( $dbh, $query ) {
		$stmt  = $dbh->prepare( "$query" );
		return $datas = $stmt->execute();
	}
}