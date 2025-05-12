<?php

if ( ! function_exists( 'eskil_core_add_portfolio_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function eskil_core_add_portfolio_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => ESKIL_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'portfolio-item',
				'layout'      => 'tabbed',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Portfolio', 'eskil-core' ),
				'description' => esc_html__( 'Global settings related to portfolio', 'eskil-core' ),
			)
		);

		if ( $page ) {
			$archive_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-archive',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Portfolio List', 'eskil-core' ),
					'description' => esc_html__( 'Settings related to portfolio archive pages', 'eskil-core' ),
				)
			);

			// Hook to include additional options after archive module options
			do_action( 'eskil_core_action_after_portfolio_options_archive', $archive_tab );

			$single_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-single',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Portfolio Single', 'eskil-core' ),
					'description' => esc_html__( 'Settings related to portfolio single pages', 'eskil-core' ),
				)
			);
			$single_tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_portfolio_single_layout',
					'title'         => esc_html__( 'Single Layout', 'eskil-core' ),
					'description'   => esc_html__( 'Choose default layout for portfolio single', 'eskil-core' ),
					'default_value' => apply_filters( 'eskil_core_filter_portfolio_single_layout_default_value', '' ),
					'options'       => apply_filters( 'eskil_core_filter_portfolio_single_layout_options', array() ),
				)
			);

			$single_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_portfolio_single_title_tag',
					'title'       => esc_html__( 'Title Tag', 'eskil-core' ),
					'description' => esc_html__( 'Choose title tag for portfolio item on portfolio single page', 'eskil-core' ),
					'options'     => eskil_core_get_select_type_options_pool( 'title_tag' ),
				)
			);

			$single_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_portfolio_single_small_variations_title_tag',
					'title'       => esc_html__( 'Title Tag - Small Layouts', 'eskil-core' ),
					'description' => esc_html__( 'Choose title tag for portfolio item small layouts on portfolio single page', 'eskil-core' ),
					'options'     => eskil_core_get_select_type_options_pool( 'title_tag' ),
				)
			);

			// Hook to include additional options after single module options
			do_action( 'eskil_core_action_after_portfolio_options_single', $single_tab );

			// Hook to include additional options after module options
			do_action( 'eskil_core_action_after_portfolio_options_map', $page );
		}
	}

	add_action( 'eskil_core_action_default_options_init', 'eskil_core_add_portfolio_options', eskil_core_get_admin_options_map_position( 'portfolio' ) );
}
