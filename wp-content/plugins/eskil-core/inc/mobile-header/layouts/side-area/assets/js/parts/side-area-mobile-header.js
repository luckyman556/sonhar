(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefSideAreaMobileHeader.init();
		}
	);

	var qodefSideAreaMobileHeader = {
		init: function () {
			var $holder = $( '#qodef-side-area-mobile-header' );

			if ( $holder.length && qodefCore.body.hasClass( 'qodef-mobile-header--side-area' ) ) {
				var $navigation = $holder.find( '.qodef-m-navigation' );
				
				$( '#qodef-page-wrapper' ).prepend( '<div class="qodef-side-area-mobile-header-cover"/>' );
				qodefSideAreaMobileHeader.initOpenerTrigger( $holder, $navigation );
				qodefSideAreaMobileHeader.initDropDownMobileMenu();

				if ( typeof qodefCore.qodefPerfectScrollbar === 'object' ) {
					qodefCore.qodefPerfectScrollbar.init( $holder );
				}
			}
		},
		initOpenerTrigger: function ( $holder, $navigation ) {
			var $openerIcon = $( '.qodef-side-area-mobile-header-opener' ),
				$closeIcon  = $holder.children( '.qodef-m-close' );

			if ( $openerIcon.length && $navigation.length ) {
				$openerIcon.on(
					'tap click',
					function ( e ) {
						e.stopPropagation();
						e.preventDefault();

						if ( $holder.hasClass( 'qodef--opened' ) ) {
							$holder.removeClass( 'qodef--opened' );
							$( 'body' ).removeClass( 'qodef-side-area-mobile-header--opened' );
							qodefCore.qodefScroll.enable();
						} else {
							$holder.addClass( 'qodef--opened' );
							$( 'body' ).addClass( 'qodef-side-area-mobile-header--opened' );
							qodefCore.qodefScroll.disable();
						}
					}
				);
			}

			$closeIcon.on(
				'tap click',
				function ( e ) {
					e.stopPropagation();
					e.preventDefault();

					if ( $holder.hasClass( 'qodef--opened' ) ) {
						$holder.removeClass( 'qodef--opened' );
						$( 'body' ).removeClass( 'qodef-side-area-mobile-header--opened' );
						qodefCore.qodefScroll.enable();
					}
				}
			);
		},
		initDropDownMobileMenu: function () {
			// if menu item has child elements, select arrow and select first anchor if hide link option is set
			var $menuItems            = $( '#qodef-side-area-mobile-header nav ul li a' );
			
			$menuItems.on(
				'tap click',
				function ( e ) {
					var $thisItem = $( this );
					
					if ( $thisItem.parent().hasClass( 'menu-item-has-children' ) ) {
						e.preventDefault();
						
						var $thisItemParent  = $thisItem.parent(),
							$thisItemSubMenu = $thisItemParent.find( '.sub-menu' ).first();
						
						if ( $thisItemSubMenu.is( ':visible' ) ) {
							$thisItemSubMenu.slideUp( 300 );
							$thisItemParent.removeClass( 'qodef--opened' );
						} else {
							$thisItemSubMenu.slideDown( 300 );
							$thisItemParent.addClass( 'qodef--opened' ).siblings().find( '.sub-menu' ).slideUp( 400 );
						}
					}
				}
			);
		}
	};

})( jQuery );
