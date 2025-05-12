<?php

if ( ! function_exists( 'eskil_core_add_twitter_list_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function eskil_core_add_twitter_list_widget( $widgets ) {
		if ( qode_framework_is_installed( 'twitter' ) ) {
			$widgets[] = 'EskilCore_Twitter_List_Widget';
		}

		return $widgets;
	}

	add_filter( 'eskil_core_filter_register_widgets', 'eskil_core_add_twitter_list_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class EskilCore_Twitter_List_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$this->set_widget_option(
				array(
					'name'       => 'widget_title',
					'field_type' => 'text',
					'title'      => esc_html__( 'Title', 'eskil-core' ),
				)
			);
			$widget_mapped = $this->import_shortcode_options(
				array(
					'shortcode_base' => 'eskil_core_twitter_list',
				)
			);
			if ( $widget_mapped ) {
				$this->set_base( 'eskil_core_twitter_list' );
				$this->set_name( esc_html__( 'Eskil Twitter List', 'eskil-core' ) );
				$this->set_description( esc_html__( 'Add a twitter list element into widget areas', 'eskil-core' ) );
			}
		}

		public function render( $atts ) {
			echo EskilCore_Twitter_List_Shortcode::call_shortcode( $atts ); // XSS OK
		}
	}
}
