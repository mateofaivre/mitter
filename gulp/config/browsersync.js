

const helpers	= require( '../utils/helpers' );
const config	= helpers.getConfig();



module.exports = {
	proxy:	config.BROWSER_SYNC.PROXY,
	open:	false,
	https:	{
		key:	config.BROWSER_SYNC.SSL_PATH_DIRECTORY + config.BROWSER_SYNC.KEY_PATH,
		cert:	config.BROWSER_SYNC.SSL_PATH_DIRECTORY + config.BROWSER_SYNC.CERT_PATH
	},
	injectChanges: true,
	port:		3000,
	online:		true,
	codeSync:	true,
	ghostMode:	{
		clicks:	false,
		forms:	false,
		scroll:	false
	}
};
