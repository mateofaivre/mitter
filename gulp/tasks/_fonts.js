

const fontsSrc = [
	'./app/assets/src/fonts/*',
	'!**/empty-folder.txt'
];
const fontsDest = './app/assets/dist/fonts/';



///////////////////////////////////////
//
//
// TASK : Fonts
//
//
///////////////////////////////////////

function fonts() {
	return gulp.src( fontsSrc )
		.pipe( gulp.dest( fontsDest ) )
		.pipe( notify( {
			message:	'TASK: "fonts" Completed! 💯',
			onLast:		true
		} ) );
}

exports.fonts = fonts;

