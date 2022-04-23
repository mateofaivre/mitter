

const browserSyncModule = require( 'browser-sync' ).create( 'server' );



///////////////////////////////////////
//
//
// TASK : Browser-sync
// http://www.browsersync.io/docs/options/
//
//
///////////////////////////////////////

function browserSync( done ) {
	browserSyncModule.init( require( '../config/browsersync.js' ) );
	done();
}

exports.browserSync = browserSync;



///////////////////////////////////////
//
//
// TASK : Reload
//
//
///////////////////////////////////////

function reloadBS( done ) {
	browserSyncModule.reload();
	done();
}

exports.reloadBS = reloadBS;

