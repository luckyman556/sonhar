(function ( $ ) {
	'use strict';

	var shortcode = 'eskil_core_blog_list';

	qodefCore.shortcodes[shortcode] = {};

	if ( typeof qodefCore.listShortcodesScripts === 'object' ) {
		$.each(
			qodefCore.listShortcodesScripts,
			function ( key, value ) {
				qodefCore.shortcodes[shortcode][key] = value;
			}
		);
	}
	
	$( document ).on(
		'eskil_trigger_get_new_posts',
		function () {
			qodefBlogListEqualHeight.init();
		}
	);
	
	$( document ).ready(
		function () {
			qodefBlogListEqualHeight.init();
		}
	);
	
	var qodefBlogListEqualHeight = {
		init: function () {
			this.holder = $('.qodef-blog.qodef--list.qodef-layout--columns.qodef-item-borders');
			
			if ( this.holder.length ) {
				this.holder.each(
					function () {
						var $list = $( this ),
							items = $list.find( '.qodef-e.qodef-grid-item' ),
							maxHeight = 0;
						
						qodef.qodefWaitForImages.check(
							$list,
							function () {
							if (items.length) {
								items.each(
									function () {
										var item = $(this);
										
										if (item.outerHeight() > maxHeight) {
											maxHeight = item.outerHeight();
										}
									}
								);
								
								items.each(
									function () {
										var item = $(this);
										item.css('height', maxHeight);
									}
								);
							}
						});
					}
				);
			}
		}
	};
	
	qodefCore.shortcodes[shortcode].qodefBlogListEqualHeight = qodefBlogListEqualHeight;
	qodefCore.shortcodes[shortcode].qodefResizeIframes = qodef.qodefResizeIframes;

})( jQuery );
