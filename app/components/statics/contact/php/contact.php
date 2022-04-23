<?php
$contacts = [
	[
		'img'      => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=046c29138c1335ef8edee7daf521ba50',
		'username' => 'Aryn Jacobssen',
		'status'   => 'offline',
	],
	[
		'img'      => 'https://images.unsplash.com/photo-1575084713138-342cae5f8d00?ixlib=rb-1.2.1&auto=format&fit=crop&w=958&q=8',
		'username' => 'Carole Landu',
		'status'   => 'offline',
	],
	[
		'img'      => 'https://images.pexels.com/photos/598745/pexels-photo-598745.jpeg?h=350&auto=compress&cs=tinysrgb',
		'username' => 'Chineze Afa',
		'status'   => '',
	],
	[
		'img'      => 'https://pbs.twimg.com/profile_images/2452384114/noplz47r59v1uxvyg8ku.png',
		'username' => 'Mok Kwang',
		'status'   => '',
	],
	[
		'img'      => 'https://randomuser.me/api/portraits/women/63.jpg',
		'username' => 'Naomi Yepes',
		'status'   => '',
	],
	[
		'img'      => 'https://images.unsplash.com/photo-1476493279419-b785d41e38d8?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=61eaea85f1aa3d065400179c78163f15',
		'username' => 'Shaamikh Ale',
		'status'   => '',
	],
	[
		'img'      => 'https://m.media-amazon.com/images/M/MV5BMjI4NDcyNjQxNl5BMl5BanBnXkFtZTgwMzI4OTM3NjM@._V1_UY256_CR13,0,172,256_AL_.jpg',
		'username' => 'Sofia Alcocer',
		'status'   => 'idle',
	],
	[
		'img'      => 'https://images.unsplash.com/photo-1509380836717-c4320ccf1a6f?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=e01c8c45a063daaf6d6e571a32bd6c90',
		'username' => 'Wen Yahui',
		'offline'  => '',
	],
	[
		'img'      => 'https://pbs.twimg.com/profile_images/737221709267374081/sdwta9Oh.jpg',
		'username' => 'Leslee Moss',
		'offline'  => 'idle',
	],

];
foreach ( $contacts as $key => $contact ) { ?>

	<div class="user">
		<img src="<?php
		echo $contact[ 'img' ] ?>" class="user-img">
		<div class="username"><?php
			echo $contact[ 'username' ] ?>
			<div class="user-status <?php
			echo $contact[ 'status' ] ?>"></div>
		</div>
	</div>
<?php
}