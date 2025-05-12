<?php
if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class Qode_Variation_Swatches_For_WooCommerce_Framework_Field_Yesno extends Qode_Variation_Swatches_For_WooCommerce_Framework_Field_Type {

	public function render_field() {
		?>
		<div class="qodef-yesno qodef-field" data-option-name="<?php echo esc_attr( $this->name ); ?>" data-option-type="radiogroup">
			<input class="qodef-field" type="radio" id="<?php echo esc_attr( $this->name ); ?>-yes" name="<?php echo esc_attr( $this->name ); ?>" value="yes" <?php echo esc_attr( $this->params['value'] ) === 'yes' ? 'checked' : ''; ?> <?php qode_variation_swatches_for_woocommerce_inline_attrs( $this->data_attrs ); ?>/>
			<label for="<?php echo esc_attr( $this->name ); ?>-yes"><?php esc_html_e( 'Yes', 'qode-variation-swatches-for-woocommerce' ); ?></label>
			<input class="qodef-field" type="radio" id="<?php echo esc_attr( $this->name ); ?>-no" name="<?php echo esc_attr( $this->name ); ?>" value="no" <?php echo esc_attr( $this->params['value'] ) === 'no' ? 'checked' : ''; ?> <?php qode_variation_swatches_for_woocommerce_inline_attrs( $this->data_attrs ); ?>/>
			<label for="<?php echo esc_attr( $this->name ); ?>-no"><?php esc_html_e( 'No', 'qode-variation-swatches-for-woocommerce' ); ?></label>
		</div>
		<?php
	}
}
