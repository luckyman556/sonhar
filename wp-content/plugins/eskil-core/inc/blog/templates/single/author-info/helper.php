<?php

if ( ! function_exists( 'eskil_core_include_blog_single_author_info_template' ) ) {
	/**
	 * Function which includes additional module on single posts page
	 */
	function eskil_core_include_blog_single_author_info_template() {
		if ( is_single() ) {
			include_once ESKIL_CORE_INC_PATH . '/blog/templates/single/author-info/templates/author-info.php';
		}
	}

	add_action( 'eskil_action_after_blog_post_item', 'eskil_core_include_blog_single_author_info_template', 15 );  // permission 15 is set to define template position
}

if ( ! function_exists( 'eskil_core_get_author_social_networks' ) ) {
	/**
	 * Function which includes author info templates on single posts page
	 */
	function eskil_core_get_author_social_networks( $user_id ) {
		$icons           = array();
		$social_networks = array(
			'facebook',
			'twitter',
			'linkedin',
			'instagram',
			'pinterest',
		);

		foreach ( $social_networks as $network ) {
			$network_meta = get_the_author_meta( 'qodef_user_' . $network, $user_id );

			if ( ! empty( $network_meta ) ) {
				$$network = array(
					'url'   => $network_meta,
					'icon'  => 'social_' . $network,
					'class' => 'qodef-user-social-' . $network,
				);

				$icons[ $network ] = $$network;
			}
		}

		return $icons;
	}
}

if ( ! function_exists( 'eskil_core_get_author_social_networks_shorten' ) ) {
	/**
	 * Function which includes author info templates on single posts page
	 */
	function eskil_core_get_author_social_networks_shorten() {
		$social_networks = array(
			'facebook'  => array(
				'label'   => 'facebook',
				'shorten' => esc_html__( 'Fb', 'eskil-core' ),
			),
			'instagram' => array(
				'label'   => 'instagram',
				'shorten' => esc_html__( 'In', 'eskil-core' ),
			),
			'twitter'   => array(
				'label'   => 'twitter',
				'shorten' => esc_html__( 'Tw', 'eskil-core' ),
			),
			'linkedin'  => array(
				'label'   => 'linkedin',
				'shorten' => esc_html__( 'Ln', 'eskil-core' ),
			),
			'pinterest' => array(
				'label'   => 'pinterest',
				'shorten' => esc_html__( 'Pin', 'eskil-core' ),
			),
		);

		return $social_networks;
	}
}
