<?php
$custom_icon    = eskil_core_get_custom_svg_opener_icon_html( 'back_to_top' );
$holder_classes = array();
if ( empty( $custom_icon ) ) {
	$holder_classes[] = 'qodef--predefined';
}
?>
<a id="qodef-back-to-top" href="#" <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<span class="qodef-back-to-top-icon">
		<span class="qodef-back-to-top-label"><?php echo esc_html__( 'Top', 'eskil-core' ); ?></span>
		<?php
		if ( ! empty( $custom_icon ) ) {
			echo eskil_core_get_custom_svg_opener_icon_html( 'back_to_top' );
		} else {
			eskil_core_render_svg_icon( 'pagination-arrow-right' );
		}
		?>
	</span>
</a>
