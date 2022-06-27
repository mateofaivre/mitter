<?php

class Meet {
	private $datasMeet;
	private $datasMeetUser;
	private $reactionsMeet;
	private $fileMeet;
	private $meetDate;
	private $toPublishMeet;
	
	public function __construct() {
	
	}
	
	public function setMeetDatas( $dbh ) {
		$stmtMeet  = $dbh->prepare( "SELECT text, publication.idPublication, date_publication, publication.idUser  FROM publication, publication_meta WHERE publication.idPublication = publication_meta.idPublication ORDER BY date_publication DESC" );
		$datasMeet = $stmtMeet->execute();
		$meets     = [];
		while ( $datasMeet = $stmtMeet->fetch() ) {
			array_push( $meets, $datasMeet );
		}
		$this->datasMeet = $meets;
	}
	
	public function getMeetDatas() {
		return $this->datasMeet;
	}
	
	public function setMeetDatasUser( $dbh, $idUser ) {
		$stmtMeetUser  = $dbh->prepare( "SELECT text, publication.idPublication, date_publication, publication.idUser  FROM publication, publication_meta WHERE publication.idPublication = publication_meta.idPublication AND idUser = $idUser ORDER BY date_publication DESC" );
		$datasMeetUser = $stmtMeetUser->execute();
		$meets         = [];
		while ( $datasMeetUser = $stmtMeetUser->fetch() ) {
			array_push( $meets, $datasMeetUser );
		}
		$this->datasMeetUser = $meets;
	}
	
	public function getMeetDatasUser() {
		return $this->datasMeetUser;
	}
	
	public function setMeetReactions( $dbh, $idUser, $idPublication ) {
		$stmtMeetReactions   = $dbh->prepare( "SELECT publication.idPublication, type FROM publication, publication_meta, publication_like WHERE publication.idPublication = publication_meta.idPublication AND publication.idUser = '$idUser' AND publication.idPublication = publication_like.idPublication AND publication.idPublication = '$idPublication'" );
		$this->reactionsMeet = $stmtMeetReactions->execute();
		$rts                 = 0;
		$likes               = 0;
		while ( $this->reactionsMeet = $stmtMeetReactions->fetch() ) {
			if ( $this->reactionsMeet[ "type" ] == 0 ) {
				$likes++;
			} else {
				$rts++;
			}
		};
		$this->reactionsMeet = [ $likes, $rts ];
	}
	
	public function getMeetReactions() {
		return $this->reactionsMeet;
	}
	
	public function setMeetFile( $dbh, $idUser, $idPublication ) {
		$stmtMeetFile   = $dbh->prepare( "SELECT idFile, file FROM publication_file, publication WHERE publication.idUser = '$idUser' AND publication.idPublication = publication_file.idPublication AND publication.idPublication = '$idPublication'" );
		$datasMeetFile  = $stmtMeetFile->execute();
		$this->fileMeet = [];
		if ( $stmtMeetFile->rowCount() != 0 ) {
			while ( $datasMeetFile = $stmtMeetFile->fetch() ) {
				array_push( $this->fileMeet, $datasMeetFile[ "file" ] );
			};
		}
	}
	
	public function getMeetFile() {
		return $this->fileMeet;
	}
	
	public function setMeetDate() {
		$meetsDates     = $this->getMeetDatas();
		$this->meetDate = [];
		foreach ( $meetsDates as $key => $meetDate ) {
			$currentDate = strtotime( date( 'Y-m-d H:i:s' ) );
			$date        = strtotime( $meetDate[ "date_publication" ] );
			$currentDay  = date( "Y-m-d" );
			$dateBefore  = date( 'Y-m-d H:i:s' );
			$dateBefore  = strtotime( "-1 day", strtotime( $dateBefore ) );
			
			if ( $date > $dateBefore && date( "G", ( $currentDate - $date ) ) != 0 ) {
				//			echo '- de 24h';
				$meetDate = date( "G", ( $currentDate - $date ) ) . "h";
			} else {
				//			echo '+ de 24h';
				$meetDate = date( "d M", $date ) . ".";
			}
			
			array_push( $this->meetDate, $meetDate );
		};
		
	}
	
	public function getMeetDate() {
		return $this->meetDate;
	}
	
	public function setMeetToPublish( $dbh, $idUser, $text, $medias ) {
		$currentDate        = date( 'Y-m-d H:i:s' );
		$stmtMeetToPublish  = $dbh->prepare( "INSERT INTO publication (idUser, idCategory, date_publication, date_modification, active) VALUES ('$idUser', '4', '$currentDate', '$currentDate', '1')" );
		$datasMeetToPublish = $stmtMeetToPublish->execute();
		$idPublication      = $dbh->lastInsertId();
		$datasMeetToPublish = $stmtMeetToPublish->fetch();
		
		$stmtMeetToPublishMetas  = $dbh->prepare( "INSERT INTO publication_meta (idPublication, text) VALUES ('$idPublication', :text)" );
		$datasMeetToPublishmetas = $stmtMeetToPublishMetas->bindParam(":text", $text);
		$datasMeetToPublishMetas = $stmtMeetToPublishMetas->execute();
		$datasMeetToPublishMetas = $stmtMeetToPublishMetas->fetch();
		
		foreach ( $medias as $key => $media ) {
			$stmtMeetToPublishMetas  = $dbh->prepare( "INSERT INTO publication_file (idPublication, file) VALUES ('$idPublication', NULLIF('$media', '') )" );
			$datasMeetToPublishMetas = $stmtMeetToPublishMetas->execute();
			$datasMeetToPublishMetas = $stmtMeetToPublishMetas->fetch();
		}
		
	}
	
	public function getMeetToPublish() {
		return $this->toPublishMeet;
	}
	
}
