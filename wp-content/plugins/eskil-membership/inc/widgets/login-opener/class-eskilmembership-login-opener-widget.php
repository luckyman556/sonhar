<?php

if ( ! function_exists( 'eskil_membership_add_author_info_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function eskil_membership_add_author_info_widget( $widgets ) {
		$widgets[] = 'EskilMembership_Login_Opener_Widget';

		return $widgets;
	}

	add_filter( 'eskil_membership_filter_register_widgets', 'eskil_membership_add_author_info_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class EskilMembership_Login_Opener_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$this->set_base( 'eskil_membership_login_opener' );
			$this->set_name( esc_html__( 'Eskil Login Opener', 'eskil-membership' ) );
			$this->set_description( esc_html__( 'Login and register membership widget', 'eskil-membership' ) );
			$this->set_widget_option(
				array(
					'field_type'  => 'text',
					'name'        => 'login_opener_margin',
					'title'       => esc_html__( 'Opener Margin', 'eskil-membership' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left', 'eskil-membership' ),
				)
			);
		}

		public function render( $atts ) {
			$classes   = array();
			$classes[] = is_user_logged_in() ? 'qodef-user-logged--in' : 'qodef-user-logged--out';

			$styles = array();

			if ( ! empty( $atts['login_opener_margin'] ) ) {
				$styles[] = 'margin: ' . $atts['login_opener_margin'];
			}

			$dashboard_template = apply_filters( 'eskil_membership_filter_dashboard_template_name', '' );

			if ( empty( $dashboard_template ) || ! is_page_template( $dashboard_template ) || ( is_page_template( $dashboard_template ) && is_user_logged_in() ) ) { ?>
				<div class="qodef-login-opener-widget <?php echo implode( ' ', $classes ); ?>" <?php qode_framework_inline_style( $styles ); ?>>
					<?php eskil_membership_template_part( 'widgets/login-opener', 'templates/holder' ); ?>
				</div>
				<?php
			}
		}
	}
}
