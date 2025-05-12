(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.eskil_core_custom_info_section = {};

	$( document ).ready(
		function () {
			qodefCustomInfoSection.init();
		}
	);

	var qodefCustomInfoSection = {
		init: function () {
			var $holder = $( '.qodef-custom-info-section' );

			if ( $holder.length ) {
				$holder.each(
					function () {
						var $thisHolder = $( this ),
							$columns    = $thisHolder.closest( '.elementor-section' ).find( '> .elementor-container > .elementor-column' );

						if ( ! $thisHolder.hasClass( 'qodef-full-height' ) && $columns.length > 1 ) {
							var $columnsArray = Array.from( $columns ),
								$tallest      = $columnsArray.reduce( ( prev, curr ) => {
									return ($( prev ).outerHeight() > $( curr ).outerHeight()) ? prev : curr;
								} ),
								$height       = $( $tallest ).outerHeight();

							$thisHolder.css(
								'height',
								$height + 'px'
							);
						}
					}
				);
			}
		}
	};


	qodefCore.shortcodes.eskil_core_custom_info_section.qodefCustomInfoSection = qodefCustomInfoSection;

})( jQuery );
