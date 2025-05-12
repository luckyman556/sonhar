(function ( $ ) {
	'use strict';
	
	$( document ).ready(
		function () {
			qodefSideAreaCart.init();
		}
	);
	
	var qodefSideAreaCart = {
		init: function () {
			var $holder = $( '.qodef-widget-side-area-cart-inner > a' );
			
			if ( $holder.length ) {
				$holder.off().each(
					function () {
						var $thisHolder = $( this ),
							$overlay = $('.qodef-woo-side-area-cart-cover');
						
						if ( 0 === $overlay.length ) {
							$( '#qodef-page-wrapper' ).prepend( '<div class="qodef-woo-side-area-cart-cover"/>' );
						}
						
						if ( qodefCore.windowWidth > 680 ) {
							qodefSideAreaCart.trigger( $thisHolder );
							qodefSideAreaCart.start( $thisHolder );
						}
						
						qodefCore.body.on(
							'added_to_cart removed_from_cart wc_fragments_refreshed',
							function () {
								qodefSideAreaCart.init();
							}
						);
						
						qodefCore.body.on(
							'removed_from_cart',
							function () {
								qodefCore.qodefScroll.enable();
								$('body').removeClass( 'qodef-side-cart--opened' );

								if ( qodefCore.body.hasClass( 'woocommerce-cart' ) ) {
									$( document.body ).trigger( 'wc_update_cart' );
								}
							}
						);
					}
				);
			}
		},
		trigger: function ( $holder ) {
			var $items = $holder.find( '.qodef-woo-side-area-cart' ),
				$detail = $holder.find( '.qodef-m-order-details' ),
				$content = $holder.find( '.qodef-widget-side-area-cart-content' ),
				$title = $holder.find( '.qodef-widget-side-area-cart-content > .qodef-e-title' );
			
			if ( $items.length && typeof qodefCore.qodefPerfectScrollbar === 'object' ) {
				$items.height( qodefCore.windowHeight -  Math.round( $detail.outerHeight( true ) + $title.outerHeight( true ) + parseInt($content.css('padding-top')) + parseInt($content.css('padding-bottom'))) - 32);
				qodefCore.qodefPerfectScrollbar.init( $items );
			}
		},
		start: function ( $link ) {
			$link[0].addEventListener(
				'click',
				function( e ) {
					e.preventDefault();
					e.stopPropagation();
					var $holder = $link.closest( '.qodef-widget-side-area-cart-inner' );
					
					if ( ! $holder.hasClass( 'qodef--opened' ) ) {
						qodefSideAreaCart.openSideArea( $holder );
						qodefSideAreaCart.trigger( $holder );
						
						$( document ).keyup(
							function ( e ) {
								if ( e.keyCode === 27 ) {
									qodefSideAreaCart.closeSideArea( $holder );
								}
							}
						);
					}
				}
			)
		},
		openSideArea: function ( $holder ) {
			qodefCore.qodefScroll.disable();
			var header = $('#qodef-page-header'),
				fsheader = $('#qodef-fullscreen-area');
			
			header.css('z-index', '102');
			fsheader.css('z-index', '102');
			$( '#qodef-top-area' ).css( 'z-index', '100' );
			
			$holder.addClass( 'qodef--opened' );
			$('body').addClass( 'qodef-side-cart--opened' );
			
			$( '.qodef-woo-side-area-cart-cover, .qodef-m-close' ).on(
				'click',
				function ( e ) {
					e.preventDefault();
					
					qodefSideAreaCart.closeSideArea( $holder );
				}
			);
		},
		closeSideArea: function ( $holder ) {
			var header = $('#qodef-page-header'),
				fsheader = $('#qodef-fullscreen-area');
			if ( $holder.hasClass( 'qodef--opened' ) ) {
				qodefCore.qodefScroll.enable();
				
				$holder.removeClass( 'qodef--opened' );
				$('body').removeClass( 'qodef-side-cart--opened' );
				
				setTimeout(function () {
					header.css('z-index', '100');
					fsheader.css('z-index', '99');
					$( '#qodef-top-area' ).css( 'z-index', '101' );
				}, 500);
			}
		}
	};
	
})( jQuery );
