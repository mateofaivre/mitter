

const rsync			= require( 'gulp-rsync' );
const config		= require( '../../configs/config-project.json' );
const deployConfig	= {
	root:			'./',
	hostname:		'',
	destination:	'',
	relative:		false,
	archive:		true,
	incremental:	false,
	recursive:		true,
	username:		'',
	// command:		true,
	// progress:		true,
	// verbose:		true,
	clean:			true,
	exclude: [
		'.git',
		'.gitignore',
		'.npmrc',
		'.DS_Store',
		'empty-folder.txt',
		'app/assets/src',
		'app/assets/**/maps',
		'base',
		'gulp',
		'gulpfile.js',
		'node_modules',
		'package.json',
		'package-lock.json'
	],
	include: [
		'*/base'
	]
};



///////////////////////////////////////
//
//
// TASK : Deploy preprod
//
//
///////////////////////////////////////

const deployConfigPreprod = Object.assign({}, deployConfig, {
	hostname:		config.DEPLOY.PREPROD.HOSTNAME,
	destination:	config.DEPLOY.PREPROD.DEST,
	username:		config.DEPLOY.PREPROD.USERNAME
});

function deployPreprod() {
	return gulp.src(['./'])
		.pipe(rsync(deployConfigPreprod));
}

exports.deployPreprod = deployPreprod;



///////////////////////////////////////
//
//
// TASK : Deploy prod
//
//
///////////////////////////////////////

const deployConfigProd = Object.assign({}, deployConfig, {
	hostname:		config.DEPLOY.PROD.HOSTNAME,
	destination:	config.DEPLOY.PROD.DEST,
	username:		config.DEPLOY.PROD.USERNAME
});

function deployProd() {
	return gulp.src(['./'])
		.pipe(rsync(deployConfigProd));
}

exports.deployProd = deployProd;
