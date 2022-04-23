

// TASKS
const { clean }						= require( './_clean' );
const { updateVersion }				= require( './_update-version' );
const { stylesDev, stylesProd  }	= require( './_styles' );
const { scriptsDev, scriptsProd }	= require( './_scripts' );
const { fonts }						= require( './_fonts' );
const { images }					= require( './_images' );
const { sprite }					= require( './_sprite' );
const { videos }					= require( './_videos' );



///////////////////////////////////////
//
//
// TASK : Build Dev
//
//
///////////////////////////////////////

exports.buildDev = gulp.series( clean, gulp.parallel(
	updateVersion,
	stylesDev,
	scriptsDev,
	fonts,
	images,
	sprite,
	videos
) );



///////////////////////////////////////
//
//
// TASK : Build  Prod
//
//
///////////////////////////////////////

exports.buildProd = gulp.series( clean, gulp.parallel(
	updateVersion,
	stylesProd,
	scriptsProd,
	fonts,
	images,
	sprite,
	videos
) );

