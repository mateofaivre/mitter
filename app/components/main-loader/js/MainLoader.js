

import AbstractView from 'abstracts/AbstractView';

import Config from 'configs/Config';

import Main from 'controllers/Main';

import Loader from 'loaders/Loader';

import Utils from 'utils/Utils';



export default new class MainLoader extends AbstractView {
	
	
	constructor() {
		super();
		
		this.E = {
			ASSET_LOAD:				'assetload',
			ASSETS_LOAD_COMPLETE:	'assetsloadcomplete',
			PROGRESS_COMPLETE:		'progresscomplete'
		};
		
		this.fakePercentage		= null;
		this.realPercentage		= null;
		this.percentage			= null;
		this.updatePercentage	= false;
		
		this.PROGRESS_LENGTH	= 50;
	}
	
	
	initDOM() {
		this.$mainLoader	= $( document.getElementById( 'main_loader' ) );
		this.$loading		= this.$mainLoader.find( '.ml--loading' );
		this.$progress		= this.$loading.find( '.ml--loading-progress' );
	}
	
	
	initEl() {
		this.assetsLoader = new Loader();
	}
	
	
	bindEvents() {
		Main.on( Main.E.RAF, this.raf, this );
		this.assetsLoader.on( this.assetsLoader.E.FILE_LOAD, this._onAssetLoad, this );
		this.assetsLoader.on( this.assetsLoader.E.COMPLETE, this._onAssetsLoadComplete, this );
	}
	
	
	raf() {
		if ( !this.updatePercentage )
			return;
		
		
		this.percentage = Math.max( this.fakePercentage, this.realPercentage );
		
		this._setProgress();
		this._checkEndProgression();
	}
	
	
	_setProgress() {
		const progress		= this.PROGRESS_LENGTH * this.percentage / 100;
		this.tw.progress	= gsap.set( this.$progress, { x:progress, force3D:true } );
	}
	
	
	_checkEndProgression() {
		if ( this.percentage >= 100 ) {
			this.updatePercentage = false;
			
			this.emit( this.E.PROGRESS_COMPLETE );
		}
	}
	
	
	load( assetsToLoad ) {
		this._initProgress();
		this.assetsLoader.load( assetsToLoad );
	}
	
	
	_initProgress() {
		this._resetValues();
		this._progressFakePercentage( 0 );
	}
	
	
	_onAssetLoad( asset ) {
		this.progression = asset.progression;
		
		this.emit( this.E.ASSET_LOAD, asset );
	}
	
	
	_onAssetsLoadComplete( assets ) {
		this.progression = 1;
		
		this.emit( this.E.ASSETS_LOAD_COMPLETE, assets );
	}
	
	
	_resetValues() {
		this.fakePercentage		= 0;
		this.realPercentage		= 0;
		this.percentage			= 0;
		this.updatePercentage	= true;
	}
	
	
	_progressFakePercentage( percentage ) {
		this.killTimeline( 'fakePerc' );
		
		if ( !this.updatePercentage )
			return;
		
		
		percentage					= Math.max( this.fakePercentage, percentage );
		const offset				= percentage > 85 ? 1 : 1 + Math.random() * 3;
		const tempFakePercentage	= percentage + offset < 99 ? percentage + offset : 99;
		
		this.tl.fakePerc = gsap.timeline( {
			onComplete: this._progressFakePercentage.bind( this, tempFakePercentage )
		} )
			.to( this, { duration:0.5, fakePercentage:tempFakePercentage, ease:'power1' } );
	}
	
	
	_progressRealPercentage( percentage ) {
		this.killTimeline( 'realPerc' );
		
		this.tl.realPerc = gsap.timeline( {
			onComplete: this._progressFakePercentage.bind( this, percentage )
		} )
			.to( this, { duration:0.5, realPercentage:percentage, ease:'power1' } );
	}
	
	
	hide( isFirstLoad, state = null ) { // isFirstLoad/state can be used if we need a different transition on first screen
		const deferred = Utils.Deferred();
		
		this.tl.hide = gsap.timeline( {
			paused:		true,
			onComplete:	this._onHideComplete.bind( this, deferred, isFirstLoad )
		} )
			.to( this.$mainLoader, { duration:0.5, opacity:0, ease:'power1.inOut' }, 0 )
			.play();
		
		
		return deferred.promise;
	}
	
	
	_onHideComplete( deferred, isFirstLoad ) {
		this.display = false;
		
		this.killTimeline( 'fakePerc' );
		this.killTimeline( 'realPerc' );
		
		if ( isFirstLoad )
			this.$mainLoader[0].classList.remove( 'init' );
		
		deferred.resolve();
	}
	
	
	show() {
		const deferred = Utils.Deferred();
		
		this.tl.show = gsap.timeline( {
			paused:				true,
			onStart:			this._onShowStart.bind( this ),
			onComplete:			this._onShowComplete.bind( this, deferred )
		} )
			.set( this.$progress, { x:0, force3D:true }, 0 )
			.to( this.$mainLoader, { duration:0.5, opacity:1, ease:'power1.inOut' }, 0 )
			.play();
		
		
		return deferred.promise;
	}
	
	
	_onShowStart() {
		this.display = true;
	}
	
	
	_onShowComplete( deferred ) {
		deferred.resolve();
	}
	
	
	set progression( value ) {
		const percentage = Math.floor( value * 100 );
		this._progressRealPercentage( percentage );
	}
	
	
	set display( value ) {
		if ( value ) {
			this.$mainLoader[0].style.display = 'block';
			this.$mainLoader[0].offsetHeight; // jshint ignore:line
		}
		else
			this.$mainLoader[0].style.display = 'none';
	}
	
	
}

