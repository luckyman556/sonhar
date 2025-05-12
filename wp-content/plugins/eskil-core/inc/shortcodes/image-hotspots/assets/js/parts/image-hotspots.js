(function ( $ ) {
	'use strict';
	
	$( document ).ready(
		function () {
			qodefImageHotspots.init();
		}
	);
	
	var qodefImageHotspots = {
		init: function () {
			this.holder = $( '.qodef-image-hotspots' );
			
			if ( this.holder.length ) {
				this.holder.each(
					function () {
						var $holder = $( this ),
							$info = $holder.find('.qodef-m-info'),
							$rightEdge = $holder.offset().left + $holder.width();
						if ( $info.length ) {
							Array.from($info).map(item => {
								var $item = $(item);
								if ( $item.offset().left + $item.width() > $rightEdge ) {
									$item.css('left', 'auto').css('right', '26px');
								}
							});
						}
					}
				);
			}
		},
	};
	
	
	qodefCore.shortcodes.eskil_core_image_hotspots = {};
	qodefCore.shortcodes.eskil_core_image_hotspots.qodefImageHotspots = qodefImageHotspots;
	
})( jQuery );
