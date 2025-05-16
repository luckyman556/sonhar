<?php

if ( ! class_exists( 'Eskil_Handler' ) ) {
	/**
	 * Main theme class with configuration
	 */
	class Eskil_Handler {
		private static $instance;

		public function __construct() {

			// Include required files
			require_once get_template_directory() . '/constants.php';
			require_once ESKIL_ROOT_DIR . '/helpers/helper.php';

			// Include theme's style and inline style
			add_action( 'wp_enqueue_scripts', array( $this, 'include_css_scripts' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'add_inline_style' ) );

			// Include theme's script and localize theme's main js script
			add_action( 'wp_enqueue_scripts', array( $this, 'include_js_scripts' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'localize_js_scripts' ) );

			// Include theme's 3rd party plugins styles
			add_action( 'eskil_action_before_main_css', array( $this, 'include_plugins_styles' ) );

			// Include theme's 3rd party plugins scripts
			add_action( 'eskil_action_before_main_js', array( $this, 'include_plugins_scripts' ) );

			// Add pingback header
			add_action( 'wp_head', array( $this, 'add_pingback_header' ), 1 );

			// Include theme's skip link
			add_action( 'eskil_action_after_body_tag_open', array( $this, 'add_skip_link' ), 5 );

			// Include theme's Google fonts
			add_action( 'eskil_action_before_main_css', array( $this, 'include_google_fonts' ) );

			// Add theme's supports feature
			add_action( 'after_setup_theme', array( $this, 'set_theme_support' ) );

			// Enqueue supplemental block editor styles
			add_action( 'enqueue_block_editor_assets', array( $this, 'editor_customizer_styles' ) );

			// Add theme's body classes
			add_filter( 'body_class', array( $this, 'add_body_classes' ) );

			// Include modules
			add_action( 'after_setup_theme', array( $this, 'include_modules' ) );
		}

		/**
		 * @return Eskil_Handler
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		function include_css_scripts() {
			// CSS dependency variable
			$main_css_dependency = apply_filters( 'eskil_filter_main_css_dependency', array( 'swiper' ) );

			// Hook to include additional scripts before theme's main style
			do_action( 'eskil_action_before_main_css' );

			// Enqueue theme's main style
			wp_enqueue_style( 'eskil-grid', ESKIL_ASSETS_CSS_ROOT . '/grid.min.css' );

			// Enqueue theme's main style
			wp_enqueue_style( 'eskil-main', ESKIL_ASSETS_CSS_ROOT . '/main.min.css', $main_css_dependency );

			// Enqueue theme's style
			wp_enqueue_style( 'eskil-style', ESKIL_ROOT . '/style.css' );

			// Hook to include additional scripts after theme's main style
			do_action( 'eskil_action_after_main_css' );
		}

		function add_inline_style() {
			$style = apply_filters( 'eskil_filter_add_inline_style', $style = '' );

			if ( ! empty( $style ) ) {
				wp_add_inline_style( 'eskil-style', $style );
			}
		}

		function include_js_scripts() {
			// JS dependency variable
			$main_js_dependency = apply_filters( 'eskil_filter_main_js_dependency', array( 'jquery' ) );

			// Hook to include additional scripts before theme's main script
			do_action( 'eskil_action_before_main_js', $main_js_dependency );

			// Enqueue theme's main script
			wp_enqueue_script( 'eskil-main-js', ESKIL_ASSETS_JS_ROOT . '/main.min.js', $main_js_dependency, false, true );

			// Hook to include additional scripts after theme's main script
			do_action( 'eskil_action_after_main_js' );

			// Include comment reply script
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

		function localize_js_scripts() {
			$global = apply_filters(
				'eskil_filter_localize_main_js',
				array(
					'adminBarHeight' => is_admin_bar_showing() ? 32 : 0,
					'iconArrowLeft'  => eskil_get_svg_icon( 'slider-arrow-left' ),
					'iconArrowRight' => eskil_get_svg_icon( 'slider-arrow-right' ),
					'iconClose'      => eskil_get_svg_icon( 'close' ),
				)
			);

			wp_localize_script(
				'eskil-main-js',
				'qodefGlobal',
				array(
					'vars' => $global,
				)
			);
		}

		function include_plugins_styles() {

			// Enqueue 3rd party plugins style
			wp_enqueue_style( 'swiper', ESKIL_ASSETS_ROOT . '/plugins/swiper/swiper.min.css' );
		}

		function include_plugins_scripts() {

			// JS dependency variables
			$js_3rd_party_dependency = apply_filters( 'eskil_filter_js_3rd_party_dependency', 'jquery' );

			// Enqueue 3rd party plugins script
			wp_enqueue_script( 'swiper', ESKIL_ASSETS_ROOT . '/plugins/swiper/swiper.min.js', array( $js_3rd_party_dependency ), false, true );
		}

		function add_pingback_header() {
			if ( is_singular() && pings_open( get_queried_object() ) ) { ?>
				<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
				<?php
			}
		}

		function add_skip_link() {
			echo '<a class="skip-link screen-reader-text" href="#qodef-page-content">' . esc_html__( 'Skip to the content', 'eskil' ) . '</a>';
		}

		function include_google_fonts() {
			$is_enabled = boolval( apply_filters( 'eskil_filter_enable_google_fonts', true ) );

			if ( $is_enabled ) {
				$font_subset_array = array(
					'latin-ext',
				);

				$font_weight_array = array(
					'300',
					'400',
					'400i',
					'500',
					'600',
					'700',
				);

				$default_font_family = array(
					'Jost',
					'Marcellus',
				);

				$font_weight_str = implode( ',', array_unique( apply_filters( 'eskil_filter_google_fonts_weight_list', $font_weight_array ) ) );
				$font_subset_str = implode( ',', array_unique( apply_filters( 'eskil_filter_google_fonts_subset_list', $font_subset_array ) ) );
				$fonts_array     = apply_filters( 'eskil_filter_google_fonts_list', $default_font_family );

				if ( ! empty( $fonts_array ) ) {
					$modified_default_font_family = array();

					foreach ( $fonts_array as $font ) {
						$modified_default_font_family[] = $font . ':' . $font_weight_str;
					}

					$default_font_string = implode( '|', $modified_default_font_family );

					$fonts_full_list_args = array(
						'family'  => urlencode( $default_font_string ),
						'subset'  => urlencode( $font_subset_str ),
						'display' => 'swap',
					);

					$google_fonts_url = add_query_arg( $fonts_full_list_args, 'https://fonts.googleapis.com/css' );
					wp_enqueue_style( 'eskil-google-fonts', esc_url_raw( $google_fonts_url ), array(), '1.0.0' );
				}
			}
		}

		function set_theme_support() {

			// Make theme available for translation
			load_theme_textdomain( 'eskil', ESKIL_ROOT_DIR . '/languages' );

			// Add support for feed links
			add_theme_support( 'automatic-feed-links' );

			// Add support for title tag
			add_theme_support( 'title-tag' );

			// Add support for post thumbnails
			add_theme_support( 'post-thumbnails' );

			// Add theme support for Custom Logo
			add_theme_support( 'custom-logo' );

			// Add support for full and wide align images.
			add_theme_support( 'align-wide' );

			// Set the default content width
			global $content_width;
			if ( ! isset( $content_width ) ) {
				$content_width = apply_filters( 'eskil_filter_set_content_width', 1300 );
			}

			// Add support for post formats
			add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'link', 'quote' ) );

			// Add theme support for editor style
			add_editor_style( ESKIL_ASSETS_CSS_ROOT . '/editor-style.min.css' );
		}

		function editor_customizer_styles() {

			// Include theme's Google fonts for Gutenberg editor
			$this->include_google_fonts();

			// Add editor customizer style
			wp_enqueue_style( 'eskil-editor-customizer-styles', ESKIL_ASSETS_CSS_ROOT . '/editor-customizer-style.css' );

			// Add Gutenberg blocks style
			wp_enqueue_style( 'eskil-gutenberg-blocks-style', ESKIL_INC_ROOT . '/gutenberg/assets/admin/css/gutenberg-blocks.css' );
		}

		function add_body_classes( $classes ) {
			$current_theme = wp_get_theme();
			$theme_name    = esc_attr( str_replace( ' ', '-', strtolower( $current_theme->get( 'Name' ) ) ) );
			$theme_version = esc_attr( $current_theme->get( 'Version' ) );

			// Check is child theme activated
			if ( $current_theme->parent() ) {

				// Add child theme version
				$child_theme_suffix = strpos( $theme_name, 'child' ) === false ? '-child' : '';

				$classes[] = $theme_name . $child_theme_suffix . '-' . $theme_version;

				// Get main theme variables
				$current_theme = $current_theme->parent();
				$theme_name    = esc_attr( str_replace( ' ', '-', strtolower( $current_theme->get( 'Name' ) ) ) );
				$theme_version = esc_attr( $current_theme->get( 'Version' ) );
			}

			if ( $current_theme->exists() ) {
				$classes[] = $theme_name . '-' . $theme_version;
			}

			// Set default grid size value
			$classes['grid_size'] = 'qodef-content-grid-1300';

			return apply_filters( 'eskil_filter_add_body_classes', $classes );
		}

		function include_modules() {

			// Hook to include additional files before modules inclusion
			do_action( 'eskil_action_before_include_modules' );

			foreach ( glob( ESKIL_INC_ROOT_DIR . '/*/include.php' ) as $module ) {
				include_once $module; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}

			// Hook to include additional files after modules inclusion
			do_action( 'eskil_action_after_include_modules' );
		}
	}

	Eskil_Handler::get_instance();
}

// 1. Додаємо поле "Примітка" на сторінку товару
add_action('woocommerce_before_add_to_cart_button', function() {
    echo '<div class="product-note">';
    echo '<label for="product_note">Примітка до товару:</label>';
    echo '<input type="text" id="product_note" name="product_note" style="width:100%; margin-top:5px;" />';
    echo '</div>';
});

// 2. Додаємо примітку до даних товару в кошику
add_filter('woocommerce_add_cart_item_data', function($cart_item_data, $product_id) {
    if (!empty($_POST['product_note'])) {
        $cart_item_data['product_note'] = sanitize_text_field($_POST['product_note']);
    }
    return $cart_item_data;
}, 10, 2);

// 3. Відображаємо примітку в кошику
add_filter('woocommerce_get_item_data', function($item_data, $cart_item) {
    if (!empty($cart_item['product_note'])) {
        $item_data[] = [
            'key'   => 'Примітка',
            'value' => sanitize_text_field($cart_item['product_note']),
        ];
    }
    return $item_data;
}, 10, 2);

// 4. Зберігаємо примітку в замовленні
add_action('woocommerce_add_order_item_meta', function($item_id, $values) {
    if (!empty($values['product_note'])) {
        wc_add_order_item_meta($item_id, 'Примітка', sanitize_text_field($values['product_note']));
    }
}, 10, 2);




// grouped cart

// Adding the grouped product ID custom hidden field data in Cart object
add_filter( 'woocommerce_add_cart_item_data', 'save_custom_fields_data_to_cart', 10, 2 );
function save_custom_fields_data_to_cart( $cart_item_data, $product_id ) {

    if( ! empty( $_REQUEST['add-to-cart'] ) && $product_id != $_REQUEST['add-to-cart'] ) {
        $cart_item_data['custom_data']['grouped_product_id'] = $_REQUEST['add-to-cart'];
        $data['grouped_product_id'] = $_REQUEST['add-to-cart'];

        // below statement make sure every add to cart action as unique line item
        $cart_item_data['custom_data']['unique_key'] = md5( microtime().rand() );
        WC()->session->set( 'custom_data', $data );
    }
    return $cart_item_data;
}


add_filter( 'woocommerce_blocks_cart_item_schema', function( $schema, $cart_item, $cart_item_key ) {
    if ( isset( $cart_item['custom_data'] ) ) {
        $schema['grouped_product_id'] = $cart_item['custom_data']['grouped_product_id'] ?? '';
        $schema['unique_key'] = $cart_item['custom_data']['unique_key'] ?? '';
    }
    return $schema;
}, 10, 3 );


function my_custom_enqueue_cart_extension() {
    if ( function_exists( 'is_cart' ) && is_cart() ) {
        wp_enqueue_script(
            'my-custom-cart-extension',
            get_stylesheet_directory_uri() . '/woocommerce/single-product/add-to-cart/cart-extension.js',
            [ 'wp-hooks', 'wp-element', 'wp-components' ], // dependencies
            '1.0.0',
            true
        );
    }
}
add_action( 'enqueue_block_assets', 'my_custom_enqueue_cart_extension' );


add_filter('woocommerce_get_price_html', 'remove_grouped_product_price', 20, 2);
function remove_grouped_product_price($price, $product) {
    if (is_product() && $product->is_type('grouped')) {
        return ''; // Remove price display
    }
    return $price;
}

add_action('woocommerce_before_single_product', 'conditionally_remove_short_description');
function conditionally_remove_short_description() {
    global $product;
    if ($product && $product->is_type('grouped')) {
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
    }
}

function add_grouped_product_imports() {
    wp_enqueue_style('custom-template-style', get_template_directory_uri() . '/assets/css/grouped-product.css');
	wp_enqueue_script(
        'grouped-page', 
        get_template_directory_uri() . '/assets/js/grouped-product.js',
    );
}
add_action('wp_enqueue_scripts', 'add_grouped_product_imports');