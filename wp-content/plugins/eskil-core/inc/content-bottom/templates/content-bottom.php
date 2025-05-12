<?php
$background_color = eskil_core_get_post_value_through_levels( 'qodef_content_bottom_background_color' );

if ( ! empty( $background_color ) ) {
	$styles = 'background-color: ' . $background_color;
}
?>
<?php if ( is_active_sidebar( $sidebar ) ) : ?>
	<div id="qodef-content-bottom" <?php eskil_class_attribute( implode( ' ', apply_filters( 'eskil_core_filter_content_bottom_border_classes', array() ) ) ); ?>>
		<div id="qodef-content-bottom-inner" class="<?php echo esc_attr( eskil_core_get_content_bottom_classes() ); ?>">
			<div class="qodef-grid-inner clear">
				<?php dynamic_sidebar( $sidebar ); ?>
			</div>
		</div>
	</div>
<?php endif; ?>
