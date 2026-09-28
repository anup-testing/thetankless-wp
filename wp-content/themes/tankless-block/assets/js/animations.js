/**
 * Vanilla-JS scroll-reveal + count-up animations.
 * No jQuery, no GSAP/ScrollTrigger, no external dependency.
 */
( function () {
	'use strict';

	var revealTargets = document.querySelectorAll( '.tankless-reveal' );
	var counterTargets = document.querySelectorAll( '.tankless-counter' );

	if ( ! ( 'IntersectionObserver' in window ) ) {
		revealTargets.forEach( function ( el ) { el.classList.add( 'is-visible' ); } );
		counterTargets.forEach( runCounter );
		return;
	}

	var revealObserver = new IntersectionObserver( function ( entries, observer ) {
		entries.forEach( function ( entry ) {
			if ( entry.isIntersecting ) {
				entry.target.classList.add( 'is-visible' );
				observer.unobserve( entry.target );
			}
		} );
	}, { threshold: 0.15 } );

	revealTargets.forEach( function ( el ) { revealObserver.observe( el ); } );

	var counterObserver = new IntersectionObserver( function ( entries, observer ) {
		entries.forEach( function ( entry ) {
			if ( entry.isIntersecting ) {
				runCounter( entry.target );
				observer.unobserve( entry.target );
			}
		} );
	}, { threshold: 0.5 } );

	counterTargets.forEach( function ( el ) { counterObserver.observe( el ); } );

	function runCounter( el ) {
		var target = parseInt( el.getAttribute( 'data-target' ), 10 ) || 0;
		var suffix = el.getAttribute( 'data-suffix' ) || '';
		var duration = 1200;
		var start = null;

		function step( timestamp ) {
			if ( start === null ) {
				start = timestamp;
			}
			var progress = Math.min( ( timestamp - start ) / duration, 1 );
			el.textContent = Math.floor( progress * target ) + suffix;
			if ( progress < 1 ) {
				window.requestAnimationFrame( step );
			} else {
				el.textContent = target + suffix;
			}
		}

		window.requestAnimationFrame( step );
	}
} )();
