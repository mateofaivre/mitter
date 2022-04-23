<?php
$stories = [
	[
		'img'        => 'https://pbs.twimg.com/profile_images/1102351320567164931/ZCkJgJIH.png',
		'username'   => 'Lisandro Matos',
		'story-date' => '12 hours'
	],
	[
		'img'        => 'https://pbs.twimg.com/profile_images/1153966095444992000/1lpIyHaQ.jpg',
		'username'   => 'Gvozden Boskovsky',
		'story-date' => '29 minutes',
	],
	[
		'img'        => 'https://images.unsplash.com/photo-1565464027194-7957a2295fb7?ixlib=rb-1.2.1&auto=format&fit=crop&w=3500&q=80',
		'username'   => 'Hnek Fortuin',
		'story-date' => '3 hours',
	],
	[
		'img'        => 'https://images.unsplash.com/photo-1527980965255-d3b416303d12?ixlib=rb-1.2.1&auto=format&fit=crop&w=1400&q=80',
		'username'   => 'Lubomir Dvorak',
		'story-date' => '18 hours',
	]
];


foreach ( $stories as $key => $story ) { ?>
	<div class="user">
		<img src="<?php
		echo $story[ 'img' ] ?>" alt="" class="user-img">
		<div class="username"><?php
			echo $story[ 'username' ] ?>
			<div class="album-date"><?php
				echo $story[ 'story-date' ] ?> ago
			</div>
		</div>
	</div>
<?php
} ?>