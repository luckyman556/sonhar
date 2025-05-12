<?php

if ( ! function_exists( 'eskil_core_add_image_hotspots_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function eskil_core_add_image_hotspots_shortcode( $shortcodes ) {
		$shortcodes[] = 'EskilCore_Image_Hotspots_Shortcode';

		return $shortcodes;
	}

	add_filter( 'eskil_core_filter_register_shortcodes', 'eskil_core_add_image_hotspots_shortcode' );
}

if ( class_exists( 'EskilCore_Shortcode' ) ) {
	class EskilCore_Image_Hotspots_Shortcode extends EskilCore_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'eskil_core_filter_image_hotspots_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'eskil_core_filter_image_hotspots_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( ESKIL_CORE_SHORTCODES_URL_PATH . '/image-hotspots' );
			$this->set_base( 'eskil_core_image_hotspots' );
			$this->set_name( esc_html__( 'Image Hotspots', 'eskil-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds Image Hotspots element', 'eskil-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'eskil-core' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'image',
					'name'       => 'main_image',
					'title'      => esc_html__( 'Image', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'repeater',
					'name'          => 'children',
					'title'         => esc_html__( 'Spots', 'eskil-core' ),
					'default_value' => array(
						array(
							'item_title'                   => esc_html__( 'Example Title 1', 'eskil-core' ),
							'item_pin_vertical_position'   => 'top',
							'item_pin_horizontal_position' => 'left',
						),
						array(
							'item_title' => esc_html__( 'Example Title 2', 'eskil-core' ),
						),
						array(
							'item_title'                   => esc_html__( 'Example Title 3', 'eskil-core' ),
							'item_pin_vertical_position'   => 'middle',
							'item_pin_horizontal_position' => 'right',
						),
					),
					'items'         => array(
						array(
							'field_type' => 'image',
							'name'       => 'item_image',
							'title'      => esc_html__( 'Image', 'eskil-core' ),
						),
						array(
							'field_type'    => 'text',
							'name'          => 'item_title',
							'title'         => esc_html__( 'Title', 'eskil-core' ),
							'default_value' => esc_html__( 'Example Title', 'eskil-core' ),
						),
						array(
							'field_type'    => 'select',
							'name'          => 'title_tag',
							'title'         => esc_html__( 'Title Tag', 'qi-addons-for-elementor-premium' ),
							'options'       => eskil_core_get_select_type_options_pool( 'title_tag', false ),
							'default_value' => 'p',
						),
						array(
							'field_type'    => 'text',
							'name'          => 'item_price',
							'title'         => esc_html__( 'Price', 'eskil-core' ),
							'default_value' => esc_html__( '$99', 'eskil-core' ),
						),
						array(
							'field_type' => 'text',
							'name'       => 'item_link',
							'title'      => esc_html__( 'Link', 'eskil-core' ),
						),
						array(
							'field_type'    => 'select',
							'name'          => 'item_pin_horizontal_position',
							'title'         => esc_html__( 'Pin Horizontal Position', 'eskil-core' ),
							'options'       => array(
								'left'   => esc_html__( 'Left', 'eskil-core' ),
								'center' => esc_html__( 'Center', 'eskil-core' ),
								'right'  => esc_html__( 'Right', 'eskil-core' ),
							),
							'default_value' => 'center',
						),
						array(
							'field_type'    => 'select',
							'name'          => 'item_pin_vertical_position',
							'title'         => esc_html__( 'Pin Vertical Position', 'eskil-core' ),
							'options'       => array(
								'top'    => esc_html__( 'Top', 'eskil-core' ),
								'middle' => esc_html__( 'Middle', 'eskil-core' ),
								'bottom' => esc_html__( 'Bottom', 'eskil-core' ),
							),
							'default_value' => 'middle',
						),
						array(
							'field_type' => 'text',
							'name'       => 'item_pin_vertical_offset',
							'title'      => esc_html__( 'Pin Vertical Offset', 'eskil-core' ),
						),
						array(
							'field_type' => 'slider',
							'name'       => 'item_pin_horizontal_offset',
							'title'      => esc_html__( 'Pin Horizontal Offset', 'eskil-core' ),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'image',
					'name'       => 'pin',
					'title'      => esc_html__( 'Pin', 'eskil-core' ),
				)
			);
			$this->map_extra_options();
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['items']          = $this->parse_repeater_items( $atts['children'] );
			$atts['pin']            = $this->get_pin( $atts );
			$atts['this_shortcode'] = $this;

			return eskil_core_get_template_part( 'shortcodes/image-hotspots', 'templates/content', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-image-hotspots';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';

			return implode( ' ', $holder_classes );
		}

		public function get_item_classes( $atts, $item ) {
			$item_classes = $this->init_item_classes();

			$item_classes[] = 'qodef-e-item';
			$item_classes[] = ! empty( $item['item_pin_vertical_position'] ) ? 'qodef-vertical--' . $item['item_pin_vertical_position'] : '';
			$item_classes[] = ! empty( $item['item_pin_horizontal_position'] ) ? 'qodef-horizontal--' . $item['item_pin_horizontal_position'] : '';

			if ( ! empty( $item['item_fade_info_position'] ) ) {
				$item_classes[] = 'qodef-info-position--' . $item['item_fade_info_position'];
			} elseif ( ! empty( $atts['info_position'] ) ) {
				$item_classes[] = 'qodef-info-position--' . $atts['info_position'];
			}

			return implode( ' ', $item_classes );
		}

		private function get_pin( $atts ) {

			if ( '' !== $atts['pin'] && is_array( wp_get_attachment_image_src( $atts['pin'] ) ) ) {
				$pin = wp_get_attachment_image_url( $atts['pin'], 'full', true );
			} else {
				$pin = ESKIL_CORE_INC_URL_PATH . '/shortcodes/image-hotspots/assets/img/pin.png';
			}

			return $pin;
		}

		public function get_item_styles( $item ) {
			$item_styles = array();

			if ( ! empty( $item['item_pin_vertical_offset'] ) ) {
				if ( 'middle' === $item['item_pin_vertical_position'] ) {
					$item_styles[] = 'top: ' . $item['item_pin_vertical_offset'];
				} else {
					$item_styles[] = $item['item_pin_vertical_position'] . ': ' . $item['item_pin_vertical_offset'];
				}
			}

			if ( ! empty( $item['item_pin_horizontal_offset'] ) ) {
				if ( 'center' === $item['item_pin_horizontal_position'] ) {
					$item_styles[] = 'left: ' . $item['item_pin_horizontal_offset'];
				} else {
					$item_styles[] = $item['item_pin_horizontal_position'] . ': ' . $item['item_pin_horizontal_offset'];
				}
			}

			return $item_styles;
		}
	}
}
