<?php
$taxonomy_image_meta      = get_term_meta( $id, 'qodef_product_designer_image', true );
$taxonomy_image           = ! empty( $taxonomy_image_meta ) ? $taxonomy_image_meta : get_option( 'woocommerce_placeholder_image', 0 );
$taxonomy_list_image_meta = get_term_meta( $id, 'qodef_product_designer_list_image', true );
$taxonomy_list_image      = ! empty( $taxonomy_list_image_meta ) ? $taxonomy_list_image_meta : '';
$proportion               = ! empty( $images_proportion ) ? $images_proportion : 'full';
?>
<?php if ( ! empty( $taxonomy_list_image ) ) { ?>
	<?php echo eskil_core_get_list_shortcode_item_image( $proportion, $taxonomy_list_image ); ?>
<?php } elseif ( ! empty( $taxonomy_image ) ) { ?>
	<?php echo eskil_core_get_list_shortcode_item_image( $proportion, $taxonomy_image ); ?>
<?php } ?>
