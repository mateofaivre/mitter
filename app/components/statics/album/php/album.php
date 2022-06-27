<?php

$meet = new Meet();
$meet->setMeetDatas( $dbh );
$meetsDatas = $meet->getMeetDatas();

$meet->setMeetDate();
$meetDate = $meet->getMeetDate();

$supportedImg   = array( 'gif', 'jpg', 'jpeg', 'png' );
$supportedSound = array( 'mp3', 'waw', 'ogg' );
;
foreach ( $meetsDatas as $key => $meetData ) {
	$user->setUsersDatas( $dbh, $meetData[ "idUser" ] );
	$userDatas = $user->getUsersDatas();
	?>
	<div class="album box">
		<div class="status-main">
			<img src="/app/assets/src/img/users/<?php
			echo $userDatas[ 'avatar' ] != NULL ? $userDatas[ 'avatar' ] : "pp.png"; ?>" class="status-img"/>
			<div class="album-detail">
				<div class="album-title"><strong><?php
						echo $userDatas[ 'prenomUser' ] . " " . $userDatas[ "nomUser" ] ?></strong></div>
				<div class="album-date"><?php
					echo $meetDate[ $key ]; ?></div>
			</div>
			<button class="intro-menu"></button>
		</div>
		<div class="album-content">
			<?php
			echo $meetData[ 'text' ] ?>

			<div class="album-photos">
				<!--				<img src="--><?php
				//				echo $post[ 'main-pic' ]; ?><!--" alt="" class="album-photo"/>-->
				<?php
				$meet->setMeetFile( $dbh, $meetData[ "idUser" ], $meetData[ "idPublication" ] );
				$meetFile = $meet->getMeetFile();
				if ( !empty( $meetFile ) ) {
					foreach ( $meetFile as $key => $file ) {
						if ($file != NULL) {
							$fileExtension = explode( ".", $file )[ 1 ]; ?>
							<div class="media" style="<?php
							echo in_array( $fileExtension, $supportedImg ) == true ? "background-image: url('/app/assets/src/medias/$file')" : "" ?>">
								<?php
								//						if ( in_array( $fileExtension, $supportedImg ) ) { ?>
								<!--							<img src="/app/assets/src/medias/--><?php
								//							echo $file; ?><!--" alt="" class="album-photo"/>-->
								<!--							--><?php
								//						}
								if ( in_array( $fileExtension, $supportedSound ) ) {
									require( $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/components/statics/audio-player/php/audio-player.php" );
								} ?>
							</div>
							<?php
						}

					}
				} ?>
			</div>
		</div>
		<div class="album-actions">
			<?php
			$meet->setMeetReactions( $dbh, $_SESSION[ "idUser" ], $meetData[ "idPublication" ] );
			$meetReactions = $meet->getMeetReactions(); ?>
			<!--			<a href="#" class="album-action">-->
			<!--				--><?php
			//				include $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/assets/src/img/comment.svg" ?>
			<!--				--><?php
			//				echo $post[ 'comments-nb' ]; ?>
			<!--			</a>-->
			<a href="#" class="album-action">
				<?php
				include $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/assets/src/img/retweet.svg" ?>
				<?php
				echo $meetReactions[ 0 ]; ?>
			</a>
			<a href="#" class="album-action">
				<?php
				include $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/assets/src/img/like.svg" ?>
				<?php
				echo $meetReactions[ 1 ]; ?>
			</a>
		</div>
	</div>
	<?php
} ?>

