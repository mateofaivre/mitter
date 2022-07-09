<?php
require_once( $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/components/statics/header/php/header.php" );
$config = Fateal\Config::getInstance();

$user = new User();
$user->setUsersDatas( $dbh, $_SESSION[ "idUser" ] );
$userDatas = $user->getUsersDatas();
?>
	<body class="body body--home">
	<div id="main_container" class="main_container">
		<form class="content__inner" action="/app/components/pages/index/php/index-action.php" method="post" enctype="multipart/form-data">
			<div class="left-side">
				<div class="left-side-button">
					<?php
					include_once( $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/assets/src/img/menu.svg" ) ?>
					<?php
					include_once( $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/assets/src/img/arrow.svg" ) ?>
				</div>
				<div class="logo">MITTER</div>
				<div class="side-wrapper">
					<div class="side-title">MENU</div>
					<div class="side-menu">
						<?php
						include $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/components/statics/menu/php/menu.php";
						?>
					</div>
				</div>
			</div>
			<div class="main">
				<div class="search-bar">
					<input type="text" placeholder="Search"/>
					<button class="right-side-button">
						<?php
						include $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/assets/src/img/search.svg" ?>
					</button>
				</div>
				<div class="main-container">
					<div class="timeline">
						<div class="timeline-right">
							<div class="status box">
								<div class="status-menu">
									<a class="status-menu-item active" href="#">Status</a>
									<a class="status-menu-item" href="#">Photos</a>
									<a class="status-menu-item" href="#">Videos</a>
								</div>
								<div class="status-main">
									<div class="status-main--tweet">
										<img src="/app/assets/src/img/users/<?php
										echo $userDatas[ 'avatar' ] != NULL ? $userDatas[ 'avatar' ] : "pp.png"; ?>" class="status-img">
										<textarea class="status-textarea" placeholder="Write something..." id="meet_text" name="meet_text"></textarea>
<!--										<span class="status-textarea textarea" role="textbox" contenteditable></span>-->
									</div>
									<div class="status-main--preview">
									</div>
								</div>
								<div class="status-actions">
									<div class="meet__gallery">
										<label for="meet__gallery--btn"><?php
											include $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/assets/src/img/gallery.svg" ?></label>
										<input id="meet__gallery--btn" class="meet__gallery--btn" accept="image/png, image/gif, image/jpeg, audio/mpeg3, audio/ogg, audio/waw" type="file" multiple name="meet_gallery[]">
									</div>
									<input class="status-share" type="submit" name="meet_submit" id="meet_submit" value="Share"/>
								</div>
							</div>
							<?php
							include $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/components/statics/album/php/album.php"; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="right-side">
				<div class="account">
					<button class="account-button">
						<?php
						include $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/assets/src/img/message.svg" ?>
					</button>
					<button class="account-button">
						<?php
						include $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/assets/src/img/notif.svg" ?>
					</button>
					<span class="account-user"><?php
						echo $userDatas[ 'prenomUser' ] . " " . $userDatas[ 'nomUser' ]; ?>
        <img src="/app/assets/src/img/users/<?php
		echo $userDatas[ 'avatar' ]; ?>" alt="" class="account-profile" alt="">
        <span>▼</span>
      </span>
				</div>
				<div class="side-wrapper stories">
					<div class="side-title">STORIES</div>
					<?php
					include $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/components/statics/story/php/story.php";
					?>
				</div>
				<div class="side-wrapper contacts">
					<div class="side-title">CONTACTS</div>

					<?php
					include $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/components/statics/contact/php/contact.php";
					?>

				</div>
				<div class="search-bar right-search">
					<input type="text" placeholder="Search"/>
					<div class="search-bar-svgs">
						<?php
						include $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/assets/src/img/settings.svg" ?>
						<?php
						include $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/assets/src/img/edit.svg" ?>
						<?php
						include $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/assets/src/img/add.svg" ?>
					</div>
				</div>
			</div>
			<div class="overlay"></div>
		</form>
	</div>
	<script src="<?php
	$_SERVER[ 'DOCUMENT_ROOT' ] ?>/app/components/statics/audio-player/js/audioPlayer.js"></script>
	<script src="<?php
	$_SERVER[ 'DOCUMENT_ROOT' ] ?>/app/components/utils/preview-input-file/js/previewInputFile.js"></script>
	</body>
<?php
require_once( $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/components/statics/footer/php/footer.php" );
