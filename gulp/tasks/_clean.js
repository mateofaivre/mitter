

const cleanSRC = [ './app/assets/dist/*' ];



///////////////////////////////////////
//
//
// TASK : Clean
//
//
///////////////////////////////////////

function clean() {
	console.log( '🚿 cleaning');
	return del( cleanSRC );
}

exports.clean = clean;

