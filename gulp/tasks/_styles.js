

// Front styles related
const styleSRC			= './app/assets/src/css/styles.scss';
const styleDestination	= './app/assets/dist/css/';
	
// CSS related plugins.
const plumber		= require( 'gulp-plumber' );
const sass			= require( 'gulp-sass' );
const sassGlob		= require( 'gulp-sass-glob' );
const sourcemaps	= require( 'gulp-sourcemaps' );
const autoprefixer	= require( 'gulp-autoprefixer' );
const gcmq			= require( 'gulp-group-css-media-queries' );
const cleanCSS		= require( 'gulp-clean-css' );
const rename		= require( 'gulp-rename' );
const browserSync	= require( 'browser-sync' ).get( 'server' );

// Autoprefixer for sass
const AUTOPREFIXER_BROWSERS = [
	'last 2 version',
	'> 1%',
	'ie >= 11',
	'ie_mob >= 10',
	// 'ff >= 30',
	// 'chrome >= 34',
	// 'safari >= 7',
	// 'opera >= 23',
	// 'ios >= 7',
	// 'android >= 4',
	// 'bb >= 10'
];



///////////////////////////////////////
//
//
// TASK : Styles-dev
//
//
///////////////////////////////////////

function stylesDev(done) {
	return gulp.src(styleSRC)
		.pipe(plumber())
		.pipe(sourcemaps.init())
		.pipe(sassGlob())
		.pipe(sass.sync({
			outputStyle: 'expanded',
			precision: 3,
			emitCompileError: true
		}).on('error', (error) => {
			const file = error.relativePath.substr(error.relativePath.indexOf('/assets/') + 8);
			const msg = '💣💥 CSS error: ' + file + ' on line ' + error.line + ', column ' + error.column;
			notify().write(msg);
			// console.log( gutil.colors.red( error.message ) );
		}))
		.pipe(autoprefixer(AUTOPREFIXER_BROWSERS))
		.pipe(gcmq())
		.pipe(cleanCSS())
		.pipe(rename({suffix: '.min'}))
		.pipe(sourcemaps.write('./maps'))
		.pipe(gulp.dest(styleDestination))
		.pipe(browserSync.stream());

}

exports.stylesDev = stylesDev;



///////////////////////////////////////
//
//
// TASK : Styles-prod
//
//
///////////////////////////////////////

function stylesProd(done) {

	return gulp.src(styleSRC)
		.pipe(plumber())
		.pipe(sassGlob())
		.pipe(sass.sync({
			// outputStyle:		'compressed',
			outputStyle: 'expanded',
			precision: 3,
			emitCompileError: true
		}).on('error', (error) => {
			const file = error.relativePath.substr(error.relativePath.indexOf('/assets/') + 8);
			const msg = '💣💥 CSS error: ' + file + ' on line ' + error.line + ', column ' + error.column;
			notify().write(msg);
			// console.log( gutil.colors.red( error.message ) );
		}))
		.pipe(autoprefixer(AUTOPREFIXER_BROWSERS))
		.pipe(gcmq())
		.pipe(cleanCSS())
		.pipe(rename({suffix: '.min'}))
		.pipe(gulp.dest(styleDestination))
		.pipe(browserSync.stream());

}

exports.stylesProd = stylesProd;

