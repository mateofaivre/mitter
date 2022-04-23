

const imgConfig			= require( '../config/images' );
const mergeStream		= require( 'merge-stream' );
const imagemin			= require( 'gulp-imagemin' );
const jpegRecompress	= require( 'imagemin-jpeg-recompress' );
const pngquant			= require( 'imagemin-pngquant' );



///////////////////////////////////////
//
//
// TASK : Images
//
//
///////////////////////////////////////

function images( done ) {
	
	const merged = mergeStream();
	
	for ( const key in imgConfig.params ) {
		const params = imgConfig.params[ key ];
		
		merged.add(
			gulp.src( params.src )
				.pipe( imagemin(
					[
						jpegRecompress( {
							min: params.quality.min,
							max: params.quality.max
						} ),
						pngquant( {
							quality: [
								params.quality.min * 0.01,
								params.quality.max * 0.01
							],
							speed: 3 // default 3
						} )
					],
					{
						verbose: true
					}
				) )
				.pipe( gulp.dest( params.dest ) )
		);
	}
	
	return merged.pipe( notify( {
		message:	'TASK: "images" Completed! 💯',
		onLast:		true
	} ) );
	
}

exports.images = images;

