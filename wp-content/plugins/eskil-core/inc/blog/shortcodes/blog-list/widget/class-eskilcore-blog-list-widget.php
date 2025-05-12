<?php

if ( ! function_exists( 'eskil_core_add_blog_list_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function eskil_core_add_blog_list_widget( $widgets ) {
		$widgets[] = 'EskilCore_Blog_List_Widget';

		return $widgets;
	}

	add_filter( 'eskil_core_filter_register_widgets', 'eskil_core_add_blog_list_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class EskilCore_Blog_List_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'widget_title',
					'title'      => esc_html__( 'Title', 'eskil-core' ),
				)
			);
			$widget_mapped = $this->import_shortcode_options(
				array(
					'shortcode_base' => 'eskil_core_blog_list',
				)
			);

			if ( $widget_mapped ) {
				$this->set_base( 'eskil_core_blog_list' );
				$this->set_name( esc_html__( 'Eskil Blog List', 'eskil-core' ) );
				$this->set_description( esc_html__( 'Display a list of blog posts', 'eskil-core' ) );
			}
		}

		public function render( $atts ) {
			$atts['is_widget_element'] = 'yes';

			echo EskilCore_Blog_List_Shortcode::call_shortcode( $atts ); // XSS OK
		}
	}
}
