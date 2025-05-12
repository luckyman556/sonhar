<?php
if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

$plugins_list = qode_quick_view_for_woocommerce_get_list_of_other_plugins();

if ( ! empty( $plugins_list ) ) :
	?>
	<div class="qodef-custom-page-plugins">
		<?php foreach ( $plugins_list as $plugin_key => $plugin_item ) : ?>
			<div class="qodef-custom-page-plugin">
				<img src="<?php echo esc_url( $plugin_item['image'] ); ?>" alt="<?php echo esc_attr( $plugin_item['title'] ); ?>" width="64"/>
				<h2><?php echo esc_html( $plugin_item['title'] ); ?></h2>
				<p><?php echo esc_html( $plugin_item['description'] ); ?></p>
				<div class="qodef-plugin-buttons-holder">
					<a class="qodef-more-info qodef-body-font-family" href="<?php echo esc_url( $plugin_item['url'] ); ?>" target="_blank"><?php esc_html_e( 'More Info', 'qode-quick-view-for-woocommerce' ); ?></a>
					<?php
					$plugin_link_template = qode_quick_view_for_woocommerce_plugin_get_plugin_link( $plugin_key, $plugin_item );

					echo wp_kses_post( $plugin_link_template );
					?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<?php
endif;
