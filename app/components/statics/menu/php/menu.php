<?php

$menuCounter = isset( $menuCounter ) ? $menuCounter : 0;

$menuItems = [
	[
		[
			'svg'   => 'home',
			'title' => 'Home',
		],
		[
			'svg'   => 'latest-news',
			'title' => 'Latest news',
		],
		[
			'svg'   => 'explore',
			'title' => 'Explore',
		],
		[
			'svg'   => 'files',
			'title' => 'Files',
		],
		[
			'svg'   => 'galery',
			'title' => 'Galery',
		],
		[
			'svg'   => 'events',
			'title' => 'Events',
		],
	],
	[
		
		[
			'svg'   => 'forest',
			'title' => 'Forest',
		],
		[
			'svg'   => 'nature',
			'title' => 'Nature',
		],
		[
			'svg'   => 'animal',
			'title' => 'Animals',
		],
		[
			'svg'   => 'moto',
			'title' => 'Motobike',
		],
		[
			'svg'   => 'dance',
			'title' => 'Dance',
		],
	
	]
];


foreach ( $menuItems[ $menuCounter ] as $key => $menuItem ) { ?>
	<a href="#">
		<?php
		include $_SERVER[ 'DOCUMENT_ROOT' ] . "/app/assets/src/img/" . $menuItem[ 'svg' ] . ".svg" ?>
		<?php
		echo $menuItem[ 'title' ] ?>
	</a>
	<?php
}

$menuCounter++;
