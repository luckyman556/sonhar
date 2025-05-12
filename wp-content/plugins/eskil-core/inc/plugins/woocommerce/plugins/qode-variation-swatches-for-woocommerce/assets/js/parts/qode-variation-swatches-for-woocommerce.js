(function ( $ ) {
	'use strict';

	/*
	 **	Re-init scripts on gallery loaded
	 */
	$( document ).on(
		'qode_variation_swatches_for_woocommerce_trigger_updated_variation_gallery',
		function () {

			if ( typeof qodefCore.qodefWooMagnificPopup === 'function' ) {
				qodefCore.qodefWooMagnificPopup.init();
			}
		}
	);

	$( document ).on(
		'eskil_trigger_get_new_posts',
		function () {

			if ( typeof qodeVariationSwatchesForWooCommerce === 'object' ) {
				qodeVariationSwatchesForWooCommerce.qvsfwInitVariationSwatches.init();
			}

			if ( typeof qodeVariationSwatchesForWooCommercePremium === 'object' ) {
				qodeVariationSwatchesForWooCommercePremium.qvsfwInitVariationSwatchesPremium.init();
			}

		}
	);

})( jQuery );
