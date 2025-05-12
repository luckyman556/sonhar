<?php
if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class Qode_Quick_View_For_WooCommerce_Framework_Field_Textarea extends Qode_Quick_View_For_WooCommerce_Framework_Field_Type {

	public function render_field() {
		$rows = 10;
		?>
		<?php
		if ( ! empty( $this->args['rows'] ) ) :
			$rows = $this->args['rows'];
		endif;
		?>
		<textarea class="form-control qodef-field" <?php qode_quick_view_for_woocommerce_inline_attrs( $this->data_attrs ); ?> name="<?php echo esc_attr( $this->name ); ?>" rows="<?php echo esc_attr( $rows ); ?>"  placeholder="<?php echo isset( $this->args['placeholder'] ) ? esc_attr( esc_html( $this->args['placeholder'] ) ) : ''; ?>"
			<?php
			if ( isset( $this->args['readonly'] ) ) {
				echo ' readonly';
			}
			?>
		><?php echo esc_html( $this->params['value'] ); ?></textarea>
		<?php
	}
}
