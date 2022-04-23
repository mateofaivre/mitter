

import $ from 'cash-dom';
global.$ = $;

import gsap from 'gsap';
global.gsap = gsap;
// import SplitText from 'gsap/SplitText';
// global.SplitText = SplitText;
// gsap.registerPlugin( SplitText );

// require( '@babel/polyfill' );

import Config from 'configs/Config';
import SupportManager from 'configs/SupportManager';

import Main from 'controllers/Main';

import Index from 'views/Index';

import DebugController from 'utils/debug/DebugController';



export const App = new class {
	
	
	constructor() {
		
	}
	
	
	init() {
		Promise.all( [
			Config.init(),
			Main.init(),
			SupportManager.init()
		]).then( () => {
			const index = new Index();
			index.init( Main.$mainCont );
			
			this._manageDebugController();
		} );
	}
	
	
	_manageDebugController() {
		if ( Config.DEBUG.IS_NEEDED )
			DebugController.init();
	}
	
	
}


$( App.init() );

