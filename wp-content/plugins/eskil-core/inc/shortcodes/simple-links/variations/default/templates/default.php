<?php
$svg = '<svg xmlns="http://www.w3.org/2000/svg" width="19.369" height="19.369" viewBox="0 0 19.369 19.369"><path d="M8.742,11.053a.392.392,0,0,0,.516.59l6.261-5.478a.393.393,0,0,0,0-.59L9.258.1a.392.392,0,0,0-.516.59l5.478,4.792H.391a.391.391,0,1,0,0,.783H14.221Zm0,0" transform="translate(0 11.068) rotate(-45)"/></svg>';
?>
<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<div class="qodef-m-content">
		<?php
		foreach ( $items as $item ) { ?>
			<?php if ( ! empty( $item['item_link'] ) && ! empty( $item['item_text'] ) ) { ?>
				<a class="qodef-m-item-link" href="<?php echo esc_url( $item['item_link'] ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
					<?php if ( 'yes' === $link_icon ) {
						echo qode_framework_wp_kses_html( 'svg', $svg );
					} ?>
					<?php echo esc_html( $item['item_text'] ); ?>
				</a>
			<?php } ?>
		<?php } ?>
	</div>
</div>
