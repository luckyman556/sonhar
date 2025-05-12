<?php
if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class Qode_Variation_Swatches_For_WooCommerce_Framework_Field_Textareasvg extends Qode_Variation_Swatches_For_WooCommerce_Framework_Field_Type {

	public function render_field() {
		?>
		<textarea class="form-control qodef-field qodef--field-html" name="<?php echo esc_attr( $this->name ); ?>" rows="10"
			<?php
			if ( isset( $this->args['readonly'] ) ) {
				echo 'readonly';
			}
			?>
		>
		<?php
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo qode_variation_swatches_for_woocommerce_framework_wp_kses_html( 'svg', $this->params['value'] );
		?>
		</textarea>
		<?php
	}
}
