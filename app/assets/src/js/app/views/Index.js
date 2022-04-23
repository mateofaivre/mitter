

import AbstractPage from 'abstracts/AbstractPage';

// import Main from 'controllers/Main';
// import Screen from 'controllers/Screen';
// import Scroll from 'controllers/Scroll';
// import Device from 'controllers/Device';



export default class Index extends AbstractPage {
	
	
	constructor() {
		super();
	}
	
	
	/*initDOM( $wrapper ) {
		super.initDOM( $wrapper );
	}*/
	
	
	/*initEl() {
		super.initEl();
	}*/
	
	
	// initTl() {}
	
	
	/*bindEvents() {
		super.bindEvents();
	}*/
	
	
	/*unbindEvents() {
		super.unbindEvents();
	}*/
	
	
	setAssetsToLoad() {
		this.assetsToLoad	= [
			// { name: FILE_NAME, url: Config.THEME_URL + '/assets/dist/img/IMG' }
		];
	}
	
	
	playShow( deferred, state, delay ) {
		this.tl.show = gsap.timeline( {
			onComplete: this.onShowComplete.bind( this, deferred )
		} )
			.from( this.$pageCont, { duration:1, y:50, opacity:0, ease:'power2' }, 0 + delay );
	}
	
	
	/*resize() {
		super.resize();
	}*/
	
	
	/*raf() {
		super.()();
	}*/
	
	
	/*destroy() {
		super.destroy();
	}*/
	
	
}

