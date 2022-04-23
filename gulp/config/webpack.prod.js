

const glob = require( 'glob' );



module.exports = {
	mode: 'production',
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
				use: {
					loader: 'babel-loader',
					options: {
						presets: [ '@babel/preset-env' ]
					}
				},
				exclude: /node_modules/
			},
			{
				test: /\.js$/,
				exclude: /node_modules/,
				loader: 'ify-loader'
			}
		]
	},
	entry: {
		scripts: './app/assets/src/js/App.js'
	},
	output: {
		filename: '[name].js',
		// chunkFilename: '[name].js',
	}
};

