

import Utils from 'utils/Utils';



export default class ScrollTrigger {
	
	
	constructor(options) {
		this.wWidth = window.innerWidth;
		this.wHeight = window.innerHeight;
		this.requestAnimationFrameID = undefined;
		this.isVisible = undefined;
		this.callOnVisible = false;
		this.callOnHidden = false;
		this.targetOffsetTop = 0;
		this.targetHeight = 0;
		this.offsetTop = 0;
		this.offsetBottom = 0;
		this.targetOffsetLeft = 0;
		this.targetWidth = 0;
		this.offsetLeft = 0;
		this.offsetRight = 0;
		this.startLimit = 0;
		this.endLimit = 0;
		this.hasTween = false;

		this.options = Object.assign({
			target     : null,
			tween      : null,
			rewind     : true,
			orientation: 'y',
			onVisible  : null,
			onHidden   : null,
			startOffset: 0,
			endOffset  : 0,
			minSize    : 0
		}, options);

		if (this.options.target === null || this.options.target.length < 1) {
			console.warn("Scroll trigger: no target specified");
		}

		if (this.options.tween !== null) {
			this.hasTween = true;
			this.options.tween.pause(0);
		}

		if (this.options.onVisible && typeof this.options.onVisible === "function") {
			this.callOnVisible = true;
		}

		if (this.options.onHidden && typeof this.options.onHidden === "function") {
			this.callOnHidden = true;
		}

		// Prepare handlers
		this.scrollHandler = this.scroll.bind(this);
		this.updateHandler = this.update.bind(this);
		this.repaintHandler = this.repaint.bind(this);
		window.addEventListener('resize', this.updateHandler);

		// First init
		this.allowScrollUpdate = true;
		this.update();
	}

	/*********************************** UPDATE COORDS ***********************************/
	update() {

		if (this.requestAnimationFrameID) {
			window.cancelAnimationFrame(this.requestAnimationFrameID);
			this.requestAnimationFrameID = undefined;
		}


		// Top
		this.wHeight = window.innerHeight;
		this.targetOffsetTop = Utils.offset(this.options.target).top;
		this.targetHeight = this.options.target.offsetHeight;
		this.offsetTop = this.targetOffsetTop - this.wHeight;
		this.offsetBottom = this.targetOffsetTop + this.targetHeight;

		// Left
		this.wWidth = window.innerWidth;
		this.targetOffsetLeft = Utils.offset(this.options.target).left;
		this.targetWidth = this.options.target.offsetWidth;
		this.offsetLeft = this.targetOffsetLeft - this.wWidth;
		this.offsetRight = this.targetOffsetLeft + this.targetWidth;


		// Vertical orientation
		if (this.options.orientation === 'y') {
			if (Number.isInteger(this.options.startOffset)) {
				this.startLimit = this.offsetTop - this.options.startOffset;
			}
			else if (this.options.startOffset.slice(-1) === '%') {
				this.startLimit = this.offsetTop - (this.wHeight * parseInt(this.options.startOffset) / 100);
			}
			// Rewind offset
			if (Number.isInteger(this.options.endOffset)) {
				this.endLimit = this.offsetBottom + this.options.endOffset;
			}
			else if (this.options.startOffset.slice(-1) === '%') {
				this.endLimit = this.offsetBottom + (this.wHeight * parseInt(this.options.endOffset) / 100);
			}
			this.endLimit = Math.max(this.endLimit, this.startLimit + 1);
		}

		// Horizontal orientation
		else {
			if (Number.isInteger(this.options.startOffset)) {
				this.startLimit = this.offsetLeft - this.options.startOffset;
			}
			else if (this.options.startOffset.slice(-1) === '%') {
				startLimit = offsetLeft - (this.wWidth * parseInt(this.options.startOffset) / 100);
			}
			// Rewind offset
			if (Number.isInteger(this.options.endOffset)) {
				this.endLimit = this.offsetRight + this.options.endOffset;
			}
			else if (this.options.startOffset.slice(-1) === '%') {
				this.endLimit = this.offsetRight + (this.wWidth * parseInt(this.options.endOffset) / 100);
			}
			this.endLimit = Math.max(this.endLimit, this.startLimit + 1);
		}


		// Min size
		if (this.wWidth < this.options.minSize) {
			window.Scrollbar.removeListener(this.scrollHandler);
		}
		else {
			this.repaint();
			this.checkTrigger();
			window.Scrollbar.addListener(this.scrollHandler);
		}
	}

	/*********************************** UPDATE POSITION ***********************************/
	checkTrigger() {

		if (this.options.orientation === 'y') {
			let scrollTop = window.Scrollbar.scrollTop;
			if (this.isVisible !== true && scrollTop > this.startLimit && scrollTop < this.endLimit) {
				this.isVisible = true;
				if (this.hasTween) {
					this.options.tween.restart(true);
				}
				if (this.callOnVisible) {
					this.options.onVisible();
				}
			}
			else if (this.isVisible !== false && (scrollTop < this.startLimit || scrollTop > this.endLimit)) {
				this.isVisible = false;
				if (this.hasTween && this.options.rewind) {
					this.options.tween.pause(0);
				}
				if (this.callOnHidden) {
					this.options.onHidden();
				}
			}
		}
		else {
			let scrollLeft = window.Scrollbar.scrollLeft;
			if (this.isVisible !== true && scrollLeft > this.startLimit && scrollLeft < this.endLimit) {
				this.isVisible = true;
				if (this.hasTween) {
					this.options.tween.restart(true);
				}
				if (this.callOnVisible) {
					this.options.onVisible();
				}
			}
			else if (this.isVisible !== false && (scrollLeft < this.startLimit || scrollLeft > this.endLimit)) {
				this.isVisible = false;
				if (this.hasTween && this.options.rewind) {
					this.options.tween.pause(0);
				}
				if (this.callOnHidden) {
					this.options.onHidden();
				}
			}
		}
	}

	/*********************************** Get screen occupation ***********************************/
	getScreenVisiblityPercent() {
		let percentVisible = 0;
		if (this.options.orientation === 'y') {
			let scrollTop = window.Scrollbar.scrollTop;
			if (this.isVisible) {
				let heightFromBottom = Math.abs(this.startLimit - scrollTop),
					heightFromTop = this.endLimit - scrollTop,
					height = Math.min(this.wHeight, this.targetHeight, heightFromBottom, heightFromTop);
				percentVisible = height / this.wHeight;
			}
		}
		else {
			let scrollLeft = window.Scrollbar.scrollLeft;
			if (this.isVisible) {
				let widthFromRight = Math.abs(this.startLimit - scrollLeft),
					widthFromLeft = this.endLimit - scrollLeft,
					width = Math.min(this.wWidth, this.targetWidth, widthFromRight, widthFromLeft);
				percentVisible = width / this.wWidth;
			}
		}
		return percentVisible;
	}

	/*********************************** SCROLL ***********************************/
	scroll() {
		this.allowScrollUpdate = true;
	}

	repaint() {
		if (this.allowScrollUpdate) {
			this.checkTrigger();
			this.allowScrollUpdate = false;
		}
		this.requestAnimationFrameID = window.requestAnimationFrame(this.repaintHandler);
	}

	/*********************************** DESTROY ***********************************/
	destroy() {
		window.removeEventListener('scroll', this.scrollHandler);
		window.removeEventListener('resize', this.updateHandler);
		if (this.requestAnimationFrameID) {
			window.cancelAnimationFrame(this.requestAnimationFrameID);
			this.requestAnimationFrameID = undefined;
		}
	}
	
	
}

