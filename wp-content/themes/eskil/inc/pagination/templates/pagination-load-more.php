<?php if ( isset( $query_result ) && intval( $query_result->max_num_pages ) > 1 ) { ?>
	<div class="qodef-m-pagination qodef--load-more" <?php eskil_is_installed( 'framework' ) ? qode_framework_inline_style( $pagination_type_load_more_top_margin ) : ''; ?>>
		<div class="qodef-m-pagination-inner">
			<?php
			$button_params = array(
				'custom_class'         => 'qodef-load-more-button',
				'button_layout'        => 'outlined',
				'outlined_enable_icon' => 'yes',
				'link'                 => '#',
				'text'                 => esc_html__( 'Load More', 'eskil' ),
			);

			eskil_render_button_element( $button_params );
			?>
		</div>
	</div>
	<?php
	// Include loading spinner
	eskil_render_svg_icon( 'spinner', 'qodef-m-pagination-spinner' );
	?>
<?php } ?>
