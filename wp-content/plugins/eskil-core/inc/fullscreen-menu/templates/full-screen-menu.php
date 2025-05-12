<div id="qodef-fullscreen-area">
	<div id="qodef-fullscreen-area-inner">
		<?php if ( has_nav_menu( 'fullscreen-menu-navigation' ) ) { ?>
			<nav class="qodef-fullscreen-menu" role="navigation" aria-label="<?php esc_attr_e( 'Full Screen Menu', 'eskil-core' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'fullscreen-menu-navigation',
						'container'      => '',
						'link_before'    => '<span class="qodef-menu-item-text">',
						'link_after'     => '</span>',
						'walker'         => new EskilCoreRootMainMenuWalker(),
					)
				);
				?>
			</nav>
		<?php } ?>
		<?php
		// Include fullscreen widget area
		if ( is_active_sidebar( 'qodef-fullscreen-header-widget-area' ) ) {
			?>
			<div class="qodef-fullscreen-widget-holder">
				<?php dynamic_sidebar( 'qodef-fullscreen-header-widget-area' ); ?>
			</div>
		<?php } ?>
	</div>
</div>
