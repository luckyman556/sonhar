<?php
if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class Qode_Quick_View_For_WooCommerce_Framework_Field_Widget_Image extends Qode_Quick_View_For_WooCommerce_Framework_Field_Widget_Type {

	public function render() {
		?>
		<span class="qodef-image-uploader" data-file="no">
			<span class="qodef-image-thumb">
				<?php
				if ( '' !== $this->params['value'] ) {
					$image     = wp_get_attachment_image_src( $this->params['value'] );
					$image_src = ! empty( $image ) ? $image[0] : $this->params['value'];
					?>
					<img class="qodef-single-image" src="<?php echo esc_url( $image_src ); ?>" alt="<?php esc_attr_e( 'Image Thumbnail', 'qode-quick-view-for-woocommerce' ); ?>"/>
				<?php } ?>
			</span>
			<span class="qodef-image-meta-fields qodef-hide">
				<input type="hidden" class="qodef-field qodef-image-upload-id" id="<?php echo esc_attr( $this->params['id'] ); ?>" name="<?php echo esc_attr( $this->params['name'] ); ?>" value="<?php echo esc_attr( $this->params['value'] ); ?>"/>
			</span>
			<a class="button button-secondary qodef-image-upload-btn" href="javascript:void(0)" data-frame-title="<?php esc_attr_e( 'Select Image', 'qode-quick-view-for-woocommerce' ); ?>" data-frame-button-text="<?php esc_attr_e( 'Select Image', 'qode-quick-view-for-woocommerce' ); ?>"><?php esc_html_e( 'Upload', 'qode-quick-view-for-woocommerce' ); ?></a>
			<a href="javascript: void(0)" class="button button-secondary qodef-image-remove-btn qodef-hide"><?php esc_html_e( 'Remove', 'qode-quick-view-for-woocommerce' ); ?></a>
		</span>
		<?php
	}
}
