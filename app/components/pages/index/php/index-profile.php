<?php
require_once( $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/components/statics/header/php/header.php" );

$config = Fateal\Config::getInstance();

?>
	<body class="body body--home">
	<div id="main_container" class="main_container">
		<form class="content__inner" action="/app/components/pages/index/php/index-action.php" method="POST">
			<div class="left-side">
				<div class="left-side-button">
					<?php
					include_once( 'assets/src/img/menu.svg' ) ?>
					<?php
					include_once( 'assets/src/img/arrow.svg' ) ?>
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
				<div class="side-wrapper">
					<div class="side-title">YOUR FAVOURITE</div>
					<div class="side-menu">
						<?php
						$menuItemsFav = true;
						
						include $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/components/statics/menu/php/menu.php";
						?>
					</div>
				</div>
				<a href="https://twitter.com/AysnrTrkk" class="follow-me" target="_blank">
      <span class="follow-text">
        Follow me on Twitter
     </span>
					<span class="developer">
        <img src="https://pbs.twimg.com/profile_images/1253782473953157124/x56UURmt_400x400.jpg"/>
        Aysenur Turk — @AysnrTrkk
      </span>
				</a>
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
					<div class="profile">
						<div class="profile-avatar">
							<img src="https://images.genius.com/2326b69829d58232a2521f09333da1b3.1000x1000x1.jpg" alt="" class="profile-img">
							<div class="profile-name">Quan Ha</div>
						</div>
						<img src="https://images.unsplash.com/photo-1508247967583-7d982ea01526?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2250&q=80" alt="" class="profile-cover">
						<div class="profile-menu">
							<a class="profile-menu-link active">Timeline</a>
							<a class="profile-menu-link">About</a>
							<a class="profile-menu-link">Friends</a>
							<a class="profile-menu-link">Photos</a>
							<a class="profile-menu-link">More</a>
						</div>
					</div>
					<div class="timeline">
						<div class="timeline-left">
							<div class="intro box">
								<div class="intro-title">
									Introduction
									<button class="intro-menu"></button>
								</div>
								<div class="info">
									<div class="info-item">
										<?php
										include $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/assets/src/img/job.svg" ?>
										Product Designer at <a href="#">Bravebist</a>
									</div>
									<div class="info-item">
										<?php
										include $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/assets/src/img/home.svg" ?>
										Live in <a href="#">Hanoi, Vietnam</a>
									</div>
									<div class="info-item">
										<?php
										include $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/assets/src/img/sport.svg" ?>
										Player name <a href="#">Quan Ha</a>
									</div>
								</div>
							</div>
							<div class="event box">
								<div class="event-wrapper">
									<img src="https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80" class="event-img"/>
									<div class="event-date">
										<div class="event-month">Jan</div>
										<div class="event-day">01</div>
									</div>
									<div class="event-title">Winter Wonderland</div>
									<div class="event-subtitle">01st Jan, 2019 07:00AM</div>
								</div>
							</div>
							<div class="pages box">
								<div class="intro-title">
									Your pages
									<button class="intro-menu"></button>
								</div>
								<div class="user">
									<img src="https://images.unsplash.com/photo-1549068106-b024baf5062d?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0f" alt="" class="user-img">
									<div class="username">Chandelio</div>
								</div>
								<div class="user">
									<img src="https://images.unsplash.com/photo-1488426862026-3ee34a7d66df?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=d5849d81af587a09dbcf3f11f6fa122f" alt="" class="user-img">
									<div class="username">Janet Jolie</div>
								</div>
								<div class="user">
									<img src="https://images.unsplash.com/photo-1546539782-6fc531453083?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" class="user-img">
									<div class="username">Patrick Watsons</div>
								</div>
							</div>
						</div>
						<div class="timeline-right">
							<div class="status box">
								<div class="status-menu">
									<a class="status-menu-item active" href="#">Status</a>
									<a class="status-menu-item" href="#">Photos</a>
									<a class="status-menu-item" href="#">Videos</a>
								</div>
								<div class="status-main">
									<img src="https://images.genius.com/2326b69829d58232a2521f09333da1b3.1000x1000x1.jpg" class="status-img">
									<textarea class="status-textarea" placeholder="Write something..." name="meet_text"></textarea>
								</div>
								<div class="status-actions">
									<a href="#" class="status-action">
										<?php
										include $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/assets/src/img/people.svg" ?>
										People
									</a>
									<a href="#" class="status-action">
										<?php
										include $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/assets/src/img/check-in.svg" ?>
										Check in
									</a>
									<a href="#" class="status-action">
										<?php
										include $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/assets/src/img/mood.svg" ?>
										Mood
									</a>
									<button class="status-share" type="submit" name="meet_submit">Share</button>
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
					<span class="account-user">Quan Ha
        <img src="https://images.genius.com/2326b69829d58232a2521f09333da1b3.1000x1000x1.jpg" alt="" class="account-profile" alt="">
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
	</body>
<?php
require_once( $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/components/statics/footer/php/footer.php" );