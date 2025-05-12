<?php if ( class_exists( 'EskilCore_Social_Share_Shortcode' ) ) { ?>
	<div class="qodef-woo-product-social-share">
		<?php
		$params          = array();
		$params['title'] = esc_html__( 'Share:', 'eskil-core' );

		echo EskilCore_Social_Share_Shortcode::call_shortcode( $params );
		?>
	</div>
<?php } ?>
