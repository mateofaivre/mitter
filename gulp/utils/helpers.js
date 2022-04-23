

const helpers = {
	
	
	getConfig() {
		const config		= require( '../../configs/config-project.json' );
		const configLocal	= require( '../../configs/config-local.json' );
		
		config.BROWSER_SYNC	= configLocal.BROWSER_SYNC;
		
		
		return config;
	},
	
	
	deleteCache( path ) {
		for ( let id in require.cache )
			if ( id.indexOf( path ) >= 0 )
				delete require.cache[ id ];
	}
	
	
};


module.exports = helpers;
