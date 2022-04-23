

const srcPath	= './app/assets/src/';
const distPath	= './app/assets/dist/';



const image		= {};
image.min		= true;

image.params	= [
	
	{
		src    : [
			srcPath + 'img/**/*',
			'!' + srcPath + '**/empty-folder.txt'
		],
		dest   : distPath + 'img/',
		quality: {
			min: 90,
			max: 90
		}
	},

	{
		src    : [
			srcPath + '3d/textures/**/*',
			'!' + srcPath + '**/empty-folder.txt'
		],
		dest   : distPath + '3d/textures/',
		quality: {
			min: 80,
			max: 80
		}
	}

];


module.exports = image;

