(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefSpinner.init();
		}
	);

	$( window ).on(
		'load',
		function () {
			qodefSpinner.windowLoaded = true;
		}
	);

	$( window ).on(
		'elementor/frontend/init',
		function () {
			var isEditMode = Boolean( elementorFrontend.isEditMode() );

			if ( isEditMode ) {
				qodefSpinner.init( isEditMode );
			}
		}
	);

	var qodefSpinner = {
		holder: '',
		windowLoaded: false,
		preloaderFinished: false,
		init: function ( isEditMode ) {
			this.holder = $( '#qodef-page-spinner:not(.qodef--custom-spinner):not(.qodef-layout--textual)' );

			if ( this.holder.length ) {

				if ( this.holder.hasClass( 'qodef-layout--eskil' ) ) {

					qodef.qodefWaitForImages.check(
						qodefSpinner.holder,
						function () {
							var tl = gsap.timeline();

							tl.to(
								qodefSpinner.holder.find( '.qodef-m-eskil-images-first .qodef-m-eskil-image' ),
								{
									duration: 0,
									opacity: 1,
									ease: 'power2.in',
									stagger: 0.06,
									onComplete: function () {
										qodefSpinner.holder.find( '.qodef-m-eskil-title' ).addClass( 'qodef--appeared' );
										qodefSpinner.holder.find( '.qodef-m-eskil-subtitle' ).addClass( 'qodef--appeared' );
									}
								}
							);

							tl.to(
								qodefSpinner.holder.find( '.qodef-m-eskil-images-second .qodef-m-eskil-image' ),
								{
									duration: 0,
									opacity: 1,
									ease: 'power2.in',
									stagger: 0.06,
									onComplete: function () {
										qodefSpinner.preloaderFinished = true;
										qodefSpinner.animateSpinner( isEditMode );
										qodefSpinner.fadeOutAnimation();
									}
								}
							);
						}
					);
				} else {
					qodefSpinner.preloaderFinished = true;
					qodefSpinner.animateSpinner( isEditMode );
					qodefSpinner.fadeOutAnimation();
				}
			}
		},
		animateSpinner: function ( isEditMode ) {

			var qodefLoadInterval = setInterval(
				function () {
					if ( qodefSpinner.windowLoaded && qodefSpinner.preloaderFinished ) {
						clearInterval( qodefLoadInterval );
						qodefSpinner.fadeOutLoader();
					}
				},
				100
			);

			if ( isEditMode ) {
				qodefSpinner.fadeOutLoader();
			}
		},
		fadeOutLoader: function ( speed, delay, easing ) {
			var $holder = qodefSpinner.holder.length ? qodefSpinner.holder : $( '#qodef-page-spinner:not(.qodef--custom-spinner):not(.qodef-layout--textual)' );

			speed  = speed ? speed : 600;
			delay  = delay ? delay : 0;
			easing = easing ? easing : 'swing';

			$holder.delay( delay ).fadeOut(
				speed,
				easing
			);

			$( window ).on(
				'bind',
				'pageshow',
				function ( event ) {
					if ( event.originalEvent.persisted ) {
						$holder.fadeOut(
							speed,
							easing
						);
					}
				}
			);
		},
		fadeOutAnimation: function () {

			// Check for fade out animation
			if ( qodefCore.body.hasClass( 'qodef-spinner--fade-out' ) ) {
				var $pageHolder = $( '#qodef-page-wrapper' ),
					$linkItems  = $( 'a' );

				// If back button is pressed, than show content to avoid state where content is on display:none
				window.addEventListener(
					'pageshow',
					function ( event ) {
						var historyPath = event.persisted || (typeof window.performance !== 'undefined' && window.performance.navigation.type === 2);
						if ( historyPath && ! $pageHolder.is( ':visible' ) ) {
							$pageHolder.show();
						}
					}
				);

				$linkItems.on(
					'click',
					function ( e ) {
						var $clickedLink = $( this );

						if (
							e.which === 1 && // check if the left mouse button has been pressed
							$clickedLink.attr( 'href' ).indexOf( window.location.host ) >= 0 && // check if the link is to the same domain
							! $clickedLink.hasClass( 'remove' ) && // check is WooCommerce remove link
							$clickedLink.parent( '.product-remove' ).length <= 0 && // check is WooCommerce remove link
							$clickedLink.parents( '.woocommerce-product-gallery__image' ).length <= 0 && // check is product gallery link
							typeof $clickedLink.data( 'rel' ) === 'undefined' && // check pretty photo link
							typeof $clickedLink.attr( 'rel' ) === 'undefined' && // check VC pretty photo link
							! $clickedLink.hasClass( 'lightbox-active' ) && // check is lightbox plugin active
							(typeof $clickedLink.attr( 'target' ) === 'undefined' || $clickedLink.attr( 'target' ) === '_self') && // check if the link opens in the same window
							$clickedLink.attr( 'href' ).split( '#' )[0] !== window.location.href.split( '#' )[0] // check if it is an anchor aiming for a different page
						) {
							e.preventDefault();

							$pageHolder.fadeOut(
								600,
								'easeOutSine',
								function () {
									window.location = $clickedLink.attr( 'href' );
								}
							);
						}
					}
				);
			}
		}
	};

})( jQuery );
