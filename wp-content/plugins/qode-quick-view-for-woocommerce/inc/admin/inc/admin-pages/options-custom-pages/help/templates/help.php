<?php
if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}
?>
<div class="qodef-custom-help-page qodef-options-admin qodef-page-v4-quick-view">
	<?php qode_quick_view_for_woocommerce_framework_template_part( QODE_QUICK_VIEW_FOR_WOOCOMMERCE_ADMIN_PATH . '/inc', 'admin-pages/options-custom-pages/help', 'templates/parts/header', '' ); ?>
	<?php qode_quick_view_for_woocommerce_framework_template_part( QODE_QUICK_VIEW_FOR_WOOCOMMERCE_ADMIN_PATH . '/inc', 'admin-pages/options-custom-pages/help', 'templates/parts/knowledge', '' ); ?>
	<?php qode_quick_view_for_woocommerce_framework_template_part( QODE_QUICK_VIEW_FOR_WOOCOMMERCE_ADMIN_PATH . '/inc', 'admin-pages/options-custom-pages/help', 'templates/parts/boxes', '' ); ?>
	<?php qode_quick_view_for_woocommerce_framework_template_part( QODE_QUICK_VIEW_FOR_WOOCOMMERCE_ADMIN_PATH . '/inc', 'admin-pages/options-custom-pages/help', 'templates/parts/subscribe', '' ); ?>
	<?php qode_quick_view_for_woocommerce_framework_template_part( QODE_QUICK_VIEW_FOR_WOOCOMMERCE_ADMIN_PATH . '/inc', 'admin-pages/options-custom-pages/help', 'templates/parts/social', '' ); ?>
</div>
<?php qode_quick_view_for_woocommerce_framework_template_part( QODE_QUICK_VIEW_FOR_WOOCOMMERCE_ADMIN_PATH . '/inc', 'admin-pages/options-custom-pages/help', 'templates/parts/footer', '' ); ?>
