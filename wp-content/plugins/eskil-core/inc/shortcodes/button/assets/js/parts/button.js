(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.eskil_core_button = {};

	$( document ).ready(
		function () {
			qodefButton.init();
		}
	);

	var qodefButton = {
		init: function () {
			var $buttons = $( '.qodef-button' );

			if ( $buttons.length ) {
				$buttons.each(
					function () {
						qodefButton.initItem( $( this ) );
					}
				);
			}
		},
		initItem: function ( $currentItem ) {
			if ( $currentItem.hasClass( 'qodef-layout--text-appear' ) ) {
				qodefButton.buttonTextOnHover( $currentItem );
			}

			qodefButton.buttonHoverColor( $currentItem );
			qodefButton.buttonHoverBgColor( $currentItem );
			qodefButton.buttonHoverBorderColor( $currentItem );
		},
		buttonHoverColor: function ( $button ) {
			if ( typeof $button.data( 'hover-color' ) !== 'undefined' ) {
				var hoverColor    = $button.data( 'hover-color' );
				var originalColor = $button.css( 'color' );

				$button.on(
					'mouseenter touchstart',
					function () {
						qodefButton.changeColor(
							$button,
							'color',
							hoverColor
						);
					}
				);
				$button.on(
					'mouseleave touchend',
					function () {
						qodefButton.changeColor(
							$button,
							'color',
							originalColor
						);
					}
				);
			}
		},
		buttonHoverBgColor: function ( $button ) {
			if ( typeof $button.data( 'hover-background-color' ) !== 'undefined' ) {
				var hoverBackgroundColor    = $button.data( 'hover-background-color' );
				var originalBackgroundColor = $button.css( 'background-color' );

				$button.on(
					'mouseenter touchstart',
					function () {
						qodefButton.changeColor(
							$button,
							'background-color',
							hoverBackgroundColor
						);
					}
				);
				$button.on(
					'mouseleave touchend',
					function () {
						qodefButton.changeColor(
							$button,
							'background-color',
							originalBackgroundColor
						);
					}
				);
			}
		},
		buttonHoverBorderColor: function ( $button ) {
			if ( typeof $button.data( 'hover-border-color' ) !== 'undefined' ) {
				var hoverBorderColor    = $button.data( 'hover-border-color' );
				var originalBorderColor = $button.css( 'borderTopColor' );

				$button.on(
					'mouseenter touchstart',
					function () {
						qodefButton.changeColor(
							$button,
							'border-color',
							hoverBorderColor
						);
					}
				);
				$button.on(
					'mouseleave touchend',
					function () {
						qodefButton.changeColor(
							$button,
							'border-color',
							originalBorderColor
						);
					}
				);
			}
		},
		changeColor: function ( $button, cssProperty, color ) {
			$button.css(
				cssProperty,
				color
			);
		},
		buttonTextOnHover: function ( $currentItem ) {
			var $text      = $currentItem.find( '.qodef-m-text' ),
				$textWidth = Math.floor( $text.outerWidth() );

			$text.width( 0 );
			$currentItem.width( 24 );
			$currentItem.addClass( 'qodef--init' );

			$currentItem.on(
				'mouseenter',
				function () {
					$currentItem.width( $textWidth + 30 );
					$text.width( $textWidth );
				}
			).on(
				'mouseleave',
				function () {
					$currentItem.width( 24 );
					$text.width( 0 );
				}
			);
		}
	};

	qodefCore.shortcodes.eskil_core_button.qodefButton = qodefButton;

})( jQuery );
