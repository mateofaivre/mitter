<?php
$file      = $_FILES[ "meet_gallery" ];
$filesName = [];
for ( $i = 0; $i < count( $file[ "name" ] ); $i++ ) {
	$target_dir = "../../../../assets/src/medias/";
	array_push( $filesName, basename( $file[ "name" ][ $i ] ) );
	$target_file   = $target_dir . basename( $file[ "name" ][ $i ] );
	$uploadOk      = 1;
	$imageFileType = strtolower( pathinfo( $target_file, PATHINFO_EXTENSION ) );
	
	// Check if image file is a actual image or fake image
	if ( isset( $_POST[ "submit" ] ) ) {
		$check = getimagesize( $file[ "tmp_name" ][ $i ] );
		if ( $check !== false ) {
			echo "File is an image - " . $check[ "mime" ] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	
	// Check if file already exists
	if ( file_exists( $target_file ) ) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	
	// Check file size
//	if ( $file[ "size" ][ $i ] > 500000 ) {
//		echo "Sorry, your file is too large.";
//		$uploadOk = 0;
//	}
	
	// Allow certain file formats
	if ( $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" && $imageFileType != "mp3" && $imageFileType != "webp" && $imageFileType != "waw" && $imageFileType != "ogg" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF, MP3, OGG, WAW files are allowed.";
		$uploadOk = 0;
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ( $uploadOk == 0 ) {
		echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
	} else {
		if ( move_uploaded_file( $file[ "tmp_name" ][ $i ], $target_file ) ) {
			echo "The file " . htmlspecialchars( basename( $file[ "name" ][ $i ] ) ) . " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}

?>