<?php if ( has_nav_menu( 'mobile-navigation' ) || has_nav_menu( 'main-navigation' ) ) { ?>
	<div id="qodef-side-area-mobile-header" class="qodef-m">
		<?php
		eskil_core_get_opener_icon_html(
			array(
				'option_name'  => 'mobile_menu',
				'custom_class' => 'qodef-m-close qodef--opened',
			),
			false,
			true
		);
		?>
		<nav class="qodef-m-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Mobile Menu', 'eskil-core' ); ?>">
			<?php
			// Set main navigation menu as mobile if mobile navigation is not set
			$theme_location = has_nav_menu( 'mobile-navigation' ) ? 'mobile-navigation' : 'main-navigation';

			wp_nav_menu(
				array(
					'theme_location' => $theme_location,
					'container'      => '',
					'menu_class'     => 'yes' === eskil_core_get_post_value_through_levels( 'qodef_mobile_header_in_grid' ) ? 'qodef-content-grid' : '',
					'link_before'    => '<span class="qodef-menu-item-text">',
					'link_after'     => '</span>',
					'walker'         => new EskilCoreRootMainMenuWalker(),
					'menu_area'      => 'mobile',
				)
			);
			?>
		</nav>
		<?php
		// Include mobile widget area one
		if ( is_active_sidebar( 'qodef-mobile-header-widget-area' ) ) {
			?>
			<div class="qodef-mobile-widget-holder">
				<?php dynamic_sidebar( 'qodef-mobile-header-widget-area' ); ?>
			</div>
		<?php } ?>
	</div>
<?php } ?>
