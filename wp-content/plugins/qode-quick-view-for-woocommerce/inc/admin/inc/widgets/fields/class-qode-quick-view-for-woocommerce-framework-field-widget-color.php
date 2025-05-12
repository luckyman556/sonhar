<?php
if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class Qode_Quick_View_For_WooCommerce_Framework_Field_Widget_Color extends Qode_Quick_View_For_WooCommerce_Framework_Field_Widget_Type {

	public function render() {
		?>
		<input class="widefat qodef-color-field" data-alpha="true" id="<?php echo esc_attr( $this->params['id'] ); ?>" name="<?php echo esc_attr( $this->params['name'] ); ?>" type="text" value="<?php echo esc_attr( $this->params['value'] ); ?>"/>
		<?php
	}
}
