<?php

if ( ! function_exists( 'eskil_core_add_designer_list_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function eskil_core_add_designer_list_widget( $widgets ) {
		$widgets[] = 'EskilCore_Designer_List_Widget';

		return $widgets;
	}

	add_filter( 'eskil_core_filter_register_widgets', 'eskil_core_add_designer_list_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class EskilCore_Designer_List_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$this->set_base( 'eskil_core_designer_list' );
			$this->set_name( esc_html__( 'Eskil Designer List', 'eskil-core' ) );
			$this->set_description( esc_html__( 'Display a list of Product Designers with links to their Single pages', 'eskil-core' ) );
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'widget_title',
					'title'      => esc_html__( 'Title', 'eskil-core' ),
				)
			);
		}

		public function render( $atts ) {
			$atts['orderby'] = 'date';
			$atts['order'] = 'ASC';
			$taxonomy = 'product_designer';

			$params = [];

			$params['taxonomy_items'] = get_terms( eskil_core_get_custom_post_type_taxonomy_query_args( $atts, array( 'taxonomy' => $taxonomy ) ) );

			?>
			<div class="qodef-widget-designer-list-inner">
				<?php eskil_core_template_part( 'plugins/woocommerce/widgets/designer-list', 'templates/content', '', $params ); ?>
			</div>
			<?php
		}
	}
}
