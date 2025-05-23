<?php

if ( ! function_exists( 'eskil_core_get_list_shortcode_item_image' ) ) {
	/**
	 * Function that generates thumbnail img tag for list shortcodes
	 *
	 * @param string $image_dimension
	 * @param int $attachment_id
	 * @param int $custom_image_width
	 * @param int $custom_image_height
	 *
	 * @return string generated img tag
	 *
	 * @see qode_framework_generate_thumbnail()
	 */
	function eskil_core_get_list_shortcode_item_image( $image_dimension, $attachment_id = 0, $custom_image_width = 0, $custom_image_height = 0, $attr = array() ) {
		$item_id = get_the_ID();

		if ( 'custom' !== $image_dimension ) {
			if ( ! empty( $attachment_id ) ) {

				add_filter(
					'wp_get_attachment_image_attributes',
					function ( $attr, $attachment, $size ) use ( $attachment_id ) {

						if ( $attachment_id == $attachment->ID ) {
							$attr['class'] .= ' qodef-list-image';
						}

						return $attr;
					},
					10, 3
				);

				$html = wp_get_attachment_image( $attachment_id, $image_dimension, false, $attr );
			} else {
				$html = get_the_post_thumbnail( $item_id, $image_dimension, $attr );
			}
		} else {
			if ( ! empty( $custom_image_width ) && ! empty( $custom_image_height ) ) {
				if ( isset( $attr['class'] ) ) {
					if ( is_array( $attr['class'] ) ) {
						$attr['class'][] = 'qodef-list-image';
					} elseif ( is_string( $attr['class'] ) ) {
						$attr['class'] .= ' qodef-list-image';
					}
				} else {
					$attr['class'] = 'qodef-list-image';
				}

				if ( ! empty( $attachment_id ) ) {
					$html = qode_framework_generate_thumbnail( intval( $attachment_id ), $custom_image_width, $custom_image_height, true, $attr );
				} else {
					$html = qode_framework_generate_thumbnail( intval( get_post_thumbnail_id( $item_id ) ), $custom_image_width, $custom_image_height, true, $attr );
				}
			} else {
				$html = get_the_post_thumbnail( $item_id, $image_dimension, $attr );
			}
		}

		return apply_filters( 'eskil_core_filter_list_shortcode_item_image', $html, $attachment_id );
	}
}

if ( ! function_exists( 'eskil_core_get_list_shortcode_item_image_url' ) ) {
	/**
	 * Function that return thumbnail img url for list shortcodes
	 *
	 * @param string $image_dimension
	 * @param int $attachment_id
	 *
	 * @return string
	 */
	function eskil_core_get_list_shortcode_item_image_url( $image_dimension, $attachment_id = 0 ) {

		if ( ! empty( $attachment_id ) ) {
			$image = wp_get_attachment_image_src( intval( $attachment_id ), $image_dimension );
			$url   = is_array( $image ) ? $image[0] : '';
		} else {
			$url = get_the_post_thumbnail_url( get_the_ID(), $image_dimension );
		}

		return $url;
	}
}

//function that returns all Elementor saved templates
if ( ! function_exists( 'eskil_core_return_elementor_templates' ) ) {

	function eskil_core_return_elementor_templates() {
		return Elementor\Plugin::instance()->templates_manager->get_source( 'local' )->get_items();
	}
}

//function that adds Template Elementor Control
if ( ! function_exists( 'eskil_core_generate_elementor_templates_control' ) ) {

	function eskil_core_generate_elementor_templates_control( $object, $control_name = 'template_id' ) {
		$templates = eskil_core_return_elementor_templates();

		if ( ! empty( $templates ) ) {
			$options = array(
				'0' => '— ' . esc_html__( 'Select', 'eskil-core' ) . ' —',
			);

			$types = array();

			foreach ( $templates as $template ) {
				$options[ $template['template_id'] ] = $template['title'] . ' (' . $template['type'] . ')';
				$types[ $template['template_id'] ]   = $template['type'];
			}

			return array(
				'field_type'    => 'select',
				'name'          => 'predefined_section',
				'title'         => esc_html__( 'Choose Template', 'eskil-core' ),
				'options'       => $options,
				'default_value' => '0',
			);
		}
	}
}
