

// JS related.
const jsSRC					= './app/assets/src/js/App.js';
const jsDestination			= './app/assets/dist/js/';

const webpackStream			= require( 'webpack-stream' );
const webpack				= require( 'webpack' );



///////////////////////////////////////
//
//
// TASK : Scripts-dev
//
//
///////////////////////////////////////

function scriptsDev( done ) {
	const webpackConfig = require( '../config/webpack.dev.js' );
	
	return gulp.src( jsSRC )
		.pipe( webpackStream( { config: webpackConfig }, webpack ) )
		.pipe( gulp.dest( jsDestination ) );
}

exports.scriptsDev = scriptsDev;



///////////////////////////////////////
//
//
// TASK : Scripts-prod
//
//
///////////////////////////////////////

function scriptsProd( done ) {
	const webpackConfig = require( '../config/webpack.prod.js' );
	
	return gulp.src( jsSRC )
		.pipe( webpackStream( { config: webpackConfig }, webpack ) )
		.pipe( gulp.dest( jsDestination ) );
}

exports.scriptsProd = scriptsProd;

