<div class="qodef-m-eskil-images">
	<?php
	$spinner_gallery = eskil_core_get_post_value_through_levels( 'qodef_page_spinner_gallery' );
	$image_ids       = explode( ',', $spinner_gallery );
	?>
	<div class="qodef-m-eskil-images-first">
		<?php
		if ( ! empty( $image_ids ) ) {
			foreach ( $image_ids as $image ) {
				echo '<div class="qodef-m-eskil-image">';
				echo wp_get_attachment_image( $image, array( '104', '104' ) );
				echo '</div>';
			}
		}
		?>
	</div>
	<div class="qodef-m-eskil-images-second">
		<?php
		if ( ! empty( $image_ids ) ) {
			foreach ( $image_ids as $image ) {
				echo '<div class="qodef-m-eskil-image">';
				echo wp_get_attachment_image( $image, array( '104', '104' ) );
				echo '</div>';
			}
		}
		?>
	</div>
</div>

<h3 class="qodef-m-eskil-title">
	<?php esc_html_e( "Welcome to Eskil", "eskil-core" ); ?>
	<sup>&reg;</sup>
</h3>
<p class="qodef-m-eskil-subtitle">
	<?php esc_html_e( "Contemporary store", "eskil-core" ); ?>
</p>