(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.eskil_core_frame_slider = {};

	$( document ).ready(
		function () {
			qodefFrameSlider.init();
		}
	);

	var qodefFrameSlider = {
		init: function () {
			this.holder = $( '.qodef-frame-slider-holder' );

			if ( this.holder.length ) {
				this.holder.each(
					function () {
						qodefFrameSlider.initItem( $( this ) );
					}
				);
			}
		},
		initItem: function ( $holder ) {
			var $swiperHolder = $holder.find( '.qodef-m-swiper' ),
				$sliderHolder = $holder.find( '.qodef-m-items' ),
				$pagination   = $holder.find( '.swiper-pagination' ),
				$spacing	  = 90,
				$slidesNumber = 5;

			if ( qodefCore.windowWidth < 1024 ) {
				$slidesNumber = 3;
			}

			if ( qodefCore.windowWidth < 680 ) {
				$spacing = 40;
				$slidesNumber = 'auto';
			}

			var $swiper = new Swiper(
				$swiperHolder[0],
				{
					slidesPerView: 'auto',
					centeredSlides: true,
					spaceBetween: $spacing,
					autoplay: false,
					loop: true,
					speed: 800,
					pagination: {
						el: $pagination[0],
						type: 'bullets',
						clickable: true,
					},
				}
			);
		}
	};

	qodefCore.shortcodes.eskil_core_frame_slider.qodefFrameSlider = qodefFrameSlider;

})( jQuery );
