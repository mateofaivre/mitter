

const glob = require( 'glob' );



module.exports = {
	mode: 'development',
	resolve: {
		modules: [
			'app/assets/src/js/app',
			'app/assets/src/js/vendor',
			'node_modules'
		].concat( glob.sync( 'app/components/**/js' ) )
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: /node_modules/,
				loader: 'ify-loader'
			}
		]
	},
	entry: {
		scripts: './app/assets/src/js/App.js',
	},
	output: {
		filename: '[name].js',
		// chunkFilename: '[name].js',
		// path: './',
		// publicPath: './wp-content/themes/lesanimals/app/assets/dist/js/',
		// pathinfo: true
	}
};
