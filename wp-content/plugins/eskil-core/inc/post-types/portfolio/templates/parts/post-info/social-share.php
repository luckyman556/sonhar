<?php if ( class_exists( 'EskilCore_Social_Share_Shortcode' ) ) { ?>
	<div class="qodef-e qodef-inof--social-share">
		<?php
		$params = array(
			'title'  => esc_html__( 'Share:', 'eskil-core' ),
			'layout' => 'list',
		);

		echo EskilCore_Social_Share_Shortcode::call_shortcode( $params );
		?>
	</div>
<?php } ?>
