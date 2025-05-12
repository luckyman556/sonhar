<?php
if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class Qode_Wishlist_For_WooCommerce_Framework_Field_Widget_Text extends Qode_Wishlist_For_WooCommerce_Framework_Field_Widget_Type {

	public function render() {
		?>
		<input class="widefat" id="<?php echo esc_attr( $this->params['id'] ); ?>" name="<?php echo esc_attr( $this->params['name'] ); ?>" type="text" value="<?php echo esc_attr( $this->params['value'] ); ?>"/>
		<?php
	}
}
