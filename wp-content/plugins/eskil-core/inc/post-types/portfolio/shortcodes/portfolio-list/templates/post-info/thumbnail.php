<?php
$portfolio_list_thumbnail = get_post_meta( get_the_ID(), 'qodef_portfolio_list_thumbnail', true );
$has_image                = ! empty( $portfolio_list_image ) || has_post_thumbnail();

if ( $has_image ) {
	$image_dimension     = isset( $image_dimension ) && ! empty( $image_dimension ) ? esc_attr( $image_dimension['size'] ) : 'full';
	$custom_image_width  = isset( $custom_image_width ) && '' !== $custom_image_width ? intval( $custom_image_width ) : 0;
	$custom_image_height = isset( $custom_image_height ) && '' !== $custom_image_height ? intval( $custom_image_height ) : 0;
	?>
	<div class="qodef-e-media-thumbnail">
		<?php echo eskil_core_get_list_shortcode_item_image( $image_dimension, $portfolio_list_thumbnail, $custom_image_width, $custom_image_height ); ?>
	</div>
<?php } ?>
