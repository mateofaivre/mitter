

const videosSRC = [
	'./app/assets/src/video/**/*',
	'!**/empty-folder.txt'
];
const videosDestination = './app/assets/dist/video/';



///////////////////////////////////////
//
//
// TASK : Videos
//
//
///////////////////////////////////////

function videos() {
	return gulp.src( videosSRC )
		.pipe( gulp.dest( videosDestination ) )
		.pipe( notify( {
			message:	'TASK: "videos" Completed! 💯',
			onLast:		true
		} ) );
}

exports.videos = videos;

