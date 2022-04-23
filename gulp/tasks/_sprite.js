

// Sprites
const spriteSRC			= './app/assets/src/svg/*.svg';
const spriteDestination	= './app/assets/dist/img/';
const spriteFile		= 'sprite.svg';

const svgMin			= require( 'gulp-svgmin' );
const svgSymbols		= require( 'gulp-svg-symbols' );
const rename			= require( 'gulp-rename' );



///////////////////////////////////////
//
//
// TASK : Sprite
//
//
///////////////////////////////////////

function sprite() {
	return gulp.src( spriteSRC )
		.pipe( svgSymbols( {
			templates: [ 'default-svg' ],
		} ) )
		.pipe( rename( spriteFile ) )
		.pipe( svgMin( {
			plugins: [
				{ cleanupIDs: false },
				{ cleanupNumericValues: { floatPrecision: 2 } }
			]
		} ) )
		.pipe( gulp.dest( spriteDestination ) )
		.pipe( notify( {
			message:	'TASK: "sprite" Completed! 💯',
			onLast:		true
		} ) );
}

exports.sprite = sprite;

