

const configWatchFiles = './configs/config-project.json';
const projectPHPWatchFiles = [
	'./**/*.php'
];
const styleWatchFiles = [
	'./app/assets/src/css/styles.scss',
	'./app/assets/src/css/**/*.scss',
	'./app/components/**/*.scss'
];
const jsWatchFiles = [
	'./app/assets/src/js/**/*.js',
	'./app/assets/src/3d/shaders/**/*',
	'./app/components/**/*.js',
];
const imagesWatchFiles	= './app/assets/src/img/**/*';
const svgWatchFiles		= './app/assets/src/svg/*';
const videosWatchFiles	= './app/assets/src/video/*';
const modelsWatchFiles	= './app/assets/src/3d/models/**/*';

const { reloadBS }		= require( './_browsersync' );
const { updateVersion } = require( './_update-version' );
const { stylesDev }		= require( './_styles' );
const { scriptsDev }	= require( './_scripts' );
const { images }		= require( './_images' );
const { sprite }		= require( './_sprite' );
const { videos }		= require( './_videos' );



///////////////////////////////////////
//
//
// TASK : Watch
//
//
////////////////////////////////////////

function watch( done ) {
	gulp.watch( configWatchFiles, gulp.series( updateVersion ));
	gulp.watch( projectPHPWatchFiles, gulp.series( reloadBS ) );
	gulp.watch( styleWatchFiles, gulp.series( stylesDev ) );
	gulp.watch( jsWatchFiles, gulp.series( scriptsDev, reloadBS ) );
	gulp.watch( imagesWatchFiles, gulp.series( images, reloadBS ) );
	gulp.watch( svgWatchFiles, gulp.series( sprite, reloadBS ) );
	gulp.watch( videosWatchFiles, gulp.series( videos, reloadBS ) );
	gulp.watch( modelsWatchFiles, gulp.series( reloadBS ) );
}

exports.watch = watch;

