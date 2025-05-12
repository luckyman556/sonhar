<?php
$queried_object = get_queried_object();
$term_id        = $queried_object->term_id;

$name = $queried_object->name;
$desc = $queried_object->description;

$taxonomy_tagline    = get_term_meta( $term_id, 'qodef_product_designer_tagline', true );
$taxonomy_image_meta = get_term_meta( $term_id, 'qodef_product_designer_image', true );
$taxonomy_image      = ! empty( $taxonomy_image_meta ) ? $taxonomy_image_meta : get_option( 'woocommerce_placeholder_image', 0 );
?>

<div class="qodef-designer-content">
	<div class="qodef-designer-top-holder">
		<h1 class="qodef-designer-name"><?php echo esc_html( $name ); ?></h1>
		<?php
		if ( ! empty( $taxonomy_image ) ) { ?>
			<div class="qodef-designer-image">
				<?php echo eskil_core_get_list_shortcode_item_image( 'full', $taxonomy_image ); ?>
			</div>
		<?php } ?>
		<div class="qodef-designer-top-content">
			<?php if ( ! empty( $taxonomy_tagline ) ) { ?>
				<div class="qodef-designer-tagline">
					<p><?php echo '"' . esc_html( $taxonomy_tagline ) . '"'; ?></p>
				</div>
			<?php } ?>
			<?php if ( ! empty( $desc ) ) { ?>
				<p class="qodef-designer-label"><?php esc_html_e( 'Biography', 'eskil-core' ); ?>
				<div class="qodef-designer-desc"><?php echo qode_framework_wp_kses_html( 'content', wpautop( $desc ) ); ?></div>
			<?php } ?>
		</div>
	</div>
	<div class="qodef-designer-related">
		<?php
		$params = array(
			'columns'                => 3,
			'layout'                 => 'info-minimal',
			'title_tag'              => 'h5',
			'additional_params'      => 'tax',
			'tax'                    => 'product_designer',
			'tax_slug'               => $queried_object->slug,
			'enable_ordering_filter' => false,
		);

		echo EskilCore_Product_List_Shortcode::call_shortcode( $params );
		?>
	</div>
</div>
