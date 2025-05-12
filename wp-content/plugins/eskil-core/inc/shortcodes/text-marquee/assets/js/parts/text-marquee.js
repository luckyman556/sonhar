(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.eskil_core_text_marquee = {};

	$( document ).ready(
		function () {
			qodefTextMarquee.init();
		}
	);

	var qodefTextMarquee = {
		init: function () {
			this.holder = $( '.qodef-text-marquee' );

			if ( this.holder.length ) {
				this.holder.each(
					function () {
						qodefTextMarquee.initItem( $( this ) );
					}
				);
			}
		},
		initItem: function ( $currentItem ) {
			qodefTextMarquee.initMarquee( $currentItem );
		},
		initMarquee: function ( thisMarquee ) {
			var elements = thisMarquee.find( '.qodef-m-text' ),
				delta    = 0.03;

			elements.each(
				function ( i ) {
					$( this ).data(
						'x',
						0
					);
				}
			);

			requestAnimationFrame(
				function () {
					qodefTextMarquee.loop(
						thisMarquee,
						elements,
						delta
					);
				}
			);
		},
		inRange: function ( thisMarquee ) {
			if ( qodefCore.scroll + qodefCore.windowHeight >= thisMarquee.offset().top && qodefCore.scroll < thisMarquee.offset().top + thisMarquee.height() ) {
				return true;
			}

			return false;
		},
		loop: function ( thisMarquee, elements, delta ) {
			if ( ! qodefTextMarquee.inRange( thisMarquee ) ) {
				requestAnimationFrame(
					function () {
						qodefTextMarquee.loop(
							thisMarquee,
							elements,
							delta
						);
					}
				);
				return false;
			} else {
				elements.each(
					function ( i ) {
						var el = $( this );
						el.css(
							'transform',
							'translate3d(' + el.data( 'x' ) + '%, 0, 0)'
						);
						el.data(
							'x',
							(el.data( 'x' ) - delta).toFixed( 2 )
						);
						el.offset().left < -el.width() - 25 && el.data(
							'x',
							100 * Math.abs( i - 1 )
						);
					}
				);
				requestAnimationFrame(
					function () {
						qodefTextMarquee.loop(
							thisMarquee,
							elements,
							delta
						);
					}
				);
			}
		}
	};

	qodefCore.shortcodes.eskil_core_text_marquee.qodefTextMarquee = qodefTextMarquee;

})( jQuery );
