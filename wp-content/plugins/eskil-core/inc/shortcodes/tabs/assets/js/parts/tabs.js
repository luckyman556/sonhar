(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.eskil_core_tabs = {};

	$( document ).ready(
		() => {
			qodefTabs.init();
		}
	);

	const qodefTabs = {
		init () {
			this.holder = $( '.qodef-tabs' );

			if ( this.holder.length ) {
				this.holder.each(
					( index, element ) => {
						qodefTabs.initItem( element );
					}
				);
			}
		},
		initItem ( $currentItem ) {
			$currentItem.children( '.qodef-tabs-content' ).each(
				( index, element ) => {
					index = index + 1;

					let $that    = $( element ),
						link     = $that.attr( 'id' ),
						$navItem = $that.parent().find( '.qodef-tabs-navigation li:nth-child(' + index + ') a' ),
						navLink  = $navItem.attr( 'href' );

					link = '#' + link;

					if ( link.indexOf( navLink ) > -1 ) {
						$navItem.attr(
							'href',
							link
						);
					}
				}
			);

			$currentItem.addClass( 'qodef--init' ).tabs();
		},
		setHeight ( $holder ) {
			const $navigation = $holder.find('.qodef-tabs-navigation');
			const $content    = $holder.find('.qodef-tabs-content');
			let   navHeight,
				  contentHeight,
				  maxContentHeight = 0;

			if ( $navigation.length ) {
				navHeight = $navigation.outerHeight( true );
			}

			if ( $content.length ) {
				$content.each(
					( index, element ) => {
						contentHeight = $( element ).outerHeight( true );
						maxContentHeight = contentHeight > maxContentHeight ? contentHeight : maxContentHeight;
					}
				)
			}

			$holder.height(navHeight + maxContentHeight);
		}
	};

	qodefCore.shortcodes.eskil_core_tabs.qodefTabs = qodefTabs;

})( jQuery );
