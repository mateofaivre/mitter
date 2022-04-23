

const fs		= require( 'fs' );
const helpers	= require( '../utils/helpers' );



function writePackage( version ) {
	helpers.deleteCache( 'package.json' );
	
	const package		= require( '../../package.json' );
	let data			= fs.readFileSync( 'package.json', 'utf8' );
	const oldVersion	= `"version": "${ package.version }",`;
	version				= `"version": "${ version }",`;
	data				= data.replace( oldVersion, version );
	
	fs.writeFileSync( 'package.json', data, 'utf8' );
}



///////////////////////////////////////
//
//
// TASK : Update version
//
//
///////////////////////////////////////

function updateVersion( done) {
	helpers.deleteCache( 'configs/config-project.json' );
	
	const config = require( '../../configs/config-project.json' );
	
	writePackage( config.VERSION );
	
	done();
}

exports.updateVersion = updateVersion;

