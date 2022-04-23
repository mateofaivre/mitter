

import Lazyload from 'vanilla-lazyload';

import AbstractView from 'abstracts/AbstractView';

import Loader from 'loaders/Loader';



export default class Lazyloader extends AbstractView {
	
	
	constructor( $container, parentSelector = '.img_lazy_container', selector = '.img_lazy', autoLoad = false ) {
		super();
		
		this.$container			= $container;
		this.PARENT_SELECTOR	= parentSelector;
		this.SELECTOR			= selector;
		
		this.lazyloader		= null;
		this.posLoadedImg	= 0;
		this.isLazyloading	= false;
		
		this.init( autoLoad );
	}
	
	
	init( autoLoad ) {
		super.init();
		
		if ( autoLoad )
			this.load();
	}
	
	
	initDOM() {
		this.$imgCont = this.$container.find( this.PARENT_SELECTOR );
	}
	
	
	initEl() {
		this.nbImg = this.$imgCont.length;
	}
	
	
	destroy() {
		super.destroy();
		
		if ( this.lazyloader )
			this.lazyloader.destroy();
	}
	
	
	load() {
		if ( this.nbImg === 0 )
			return;
		
		
		this.isLazyloading = true;
		
		this.lazyloader = new Lazyload( {
			container:			this.$imgCont[ this.posLoadedImg ],
			elements_selector:	this.SELECTOR,
			class_loaded:		'img_loaded',
			callback_loaded:	this._onImageLoad.bind( this )
		} );
	}
	
	
	_onImageLoad( img ) {
		this.posLoadedImg++;
		
		this.lazyloader._settings.container.classList.add( 'img_loaded' );
		
		if ( this.posLoadedImg < this.nbImg )
			this.load();
		else
			this._onLazyloadComplete();
	}
	
	
	_onLazyloadComplete() {
		this.isLazyloading = false;
	}
	
	
};

