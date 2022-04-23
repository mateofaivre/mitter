

///////////////////////////////////////
//
//
// CONFIG
//
//
///////////////////////////////////////

global.gulp				= require( 'gulp' );
global.notify			= require( 'gulp-notify' );
global.del				= require( 'del' );

const { browserSync }	= require( './gulp/tasks/_browsersync' );
const { deployPreprod }	= require( './gulp/tasks/_deploy' );
const { deployProd }	= require( './gulp/tasks/_deploy' );
const { watch }			= require( './gulp/tasks/watch' );
const { buildDev }		= require( './gulp/tasks/build' );
const { buildProd }		= require( './gulp/tasks/build' );



///////////////////////////////////////
//
//
// TASK : Default (dev)
//
//
///////////////////////////////////////

exports.default = gulp.series(
	buildDev,
	browserSync,
	watch,
	function () {
		console.log( '🦁 Ready! 🦁' );
	}
);
exports.buildDev		= buildDev;
exports.buildProd		= buildProd;
exports.deployPreprod	= deployPreprod;
exports.deployProd		= deployProd;

