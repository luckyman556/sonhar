<?php
// Include mobile logo
eskil_core_get_mobile_header_logo_image();

// Include mobile navigation opener
eskil_core_get_opener_icon_html(
	array(
		'option_name'  => 'mobile_menu',
		'custom_class' => 'qodef-side-area-mobile-header-opener',
	)
);

// Include mobile navigation
eskil_core_template_part( 'mobile-header', 'layouts/side-area/templates/navigation' );
