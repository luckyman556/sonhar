(function ( $ ) {
	'use strict';

	$( window ).on(
		'load',
		function () {
			qodefProductSingleInfo.init();
		}
	);

	var qodefProductSingleInfo = {
		init: function () {
			var $holder = $( '.single-product.qodef-product-layout--slider' ),
				$innerDiv  = $('.qodef-woo-single-inner > div:not(.summary)'),
				$notice = $holder.find('.woocommerce-notices-wrapper');

			if ( $holder.length ) {
				$holder.each(
					function () {
						if ( $notice.length ) {
							$notice.insertBefore( $innerDiv );
						}
					}
				);
			}
		},
	}

})( jQuery );
