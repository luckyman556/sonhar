<?php

class EskilCore_Top_Area {
	private static $instance;
	private $is_top_area_enabled;
	private $is_top_area_transparent;
	private $top_area_height;
	private $is_header_transparent;

	public function __construct() {
		add_action( 'wp', array( $this, 'set_variables' ), 11 ); //after header
		add_action( 'eskil_action_before_page_header', array( $this, 'load_template' ) );
		add_filter( 'eskil_filter_localize_main_js', array( $this, 'set_global_javascript_variables' ) );
		add_filter( 'eskil_core_filter_content_margin', array( $this, 'get_content_margin' ) );
		add_filter( 'eskil_core_filter_title_padding', array( $this, 'get_title_padding' ) );
		add_filter( 'eskil_filter_add_inline_style', array( $this, 'set_inline_top_area_styles' ) );
		add_filter( 'eskil_core_filter_top_area_inner_class', array( $this, 'set_grid_class' ) );
	}

	/**
	 * @return EskilCore_Top_Area
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	function is_top_area_enabled() {
		$top_area_enabled = 'yes' === eskil_core_get_post_value_through_levels( 'qodef_top_area_header' );

		$this->is_top_area_enabled = $top_area_enabled;
	}

	public function set_top_area_height() {
		if ( $this->is_top_area_enabled ) {
			$height         = eskil_core_get_post_value_through_levels( 'qodef_top_area_header_height' );
			$top_bar_height = ! empty( $height ) ? $height : 52;

			$this->top_area_height = intval( $top_bar_height );
		} else {
			$this->top_area_height = 0;
		}
	}

	public function is_top_area_transparent() {
		$background_color = eskil_core_get_post_value_through_levels( 'qodef_top_area_header_background_color' );

		if ( ! empty( $background_color ) ) {
			if ( preg_match( '/^#[a-f0-9]{6}$/i', $background_color ) ) { //hex color is valid
				$this->is_top_area_transparent = false;
			} else {
				$this->is_top_area_transparent = true;
			}
		} else {
			$this->is_top_area_transparent = false;
		}
	}

	public function set_variables() {
		$header_object = EskilCore_Headers::get_instance()->get_header_object();

		$this->is_top_area_enabled();
		$this->is_top_area_transparent();
		$this->set_top_area_height();
		$this->is_header_transparent = ! empty( $header_object ) ? ( $header_object->get_header_transparency() || $header_object->content_behind_header() ) : false;
	}

	public function load_template() {
		$parameters = array(
			'show_header_area' => $this->is_top_area_enabled,
		);

		eskil_core_template_part( 'header/top-area/', 'templates/top-area', '', $parameters );
	}

	public function set_global_javascript_variables( $global_vars ) {
		$global_vars['topAreaHeight'] = $this->top_area_height;

		return $global_vars;
	}

	public function content_behind_header() {
		return 'yes' === eskil_core_get_post_value_through_levels( 'qodef_content_behind_header' );
	}

	public function get_content_margin( $margin ) {
		if ( ( $this->is_top_area_transparent && $this->is_header_transparent ) || $this->content_behind_header() ) {
			$margin += $this->top_area_height;
		}

		return $margin;
	}

	public function get_title_padding( $padding ) {
		if ( ( $this->is_top_area_transparent && $this->is_header_transparent ) || $this->content_behind_header() ) {
			$padding += $this->top_area_height;
		}

		return $padding;
	}

	public function set_inline_top_area_styles( $style ) {
		$styles = array();

		$background_color = eskil_core_get_post_value_through_levels( 'qodef_top_area_header_background_color' );
		$side_margin      = eskil_core_get_post_value_through_levels( 'qodef_top_area_header_side_margin' );

		if ( ! empty( $background_color ) ) {
			$styles['background-color'] = $background_color;
		}

		if ( '' !== $side_margin ) {
			if ( qode_framework_string_ends_with_space_units( $side_margin ) ) {
				$styles['margin-left']  = $side_margin;
				$styles['margin-right'] = $side_margin;
				if ( qode_framework_string_ends_with( $side_margin, 'px' ) ) {
					$styles['width'] = 'calc(100% - ' . floatval( $side_margin ) * 2 . 'px)';
				} elseif ( qode_framework_string_ends_with( $side_margin, '%' ) ) {
					$styles['width'] = 'calc(100% - ' . floatval( $side_margin ) * 2 . '%)';
				}
			} else {
				$styles['margin-left']  = intval( $side_margin ) . 'px';
				$styles['margin-right'] = intval( $side_margin ) . 'px';
				$styles['width']        = 'calc(100% - ' . floatval( $side_margin ) * 2 . 'px)';
			}
		}

		if ( ! empty( $styles ) ) {
			$style .= qode_framework_dynamic_style( '#qodef-top-area', $styles );
		}

		$inner_styles = array();

		$height       = eskil_core_get_post_value_through_levels( 'qodef_top_area_header_height' );
		$side_padding = eskil_core_get_post_value_through_levels( 'qodef_top_area_header_side_padding' );
		$border_color = eskil_core_get_post_value_through_levels( 'qodef_top_area_header_border_color' );
		$border_width = eskil_core_get_post_value_through_levels( 'qodef_top_area_header_border_width' );
		$border_style = eskil_core_get_post_value_through_levels( 'qodef_top_area_header_border_style' );

		if ( ! empty( $height ) ) {
			$inner_styles['height'] = intval( $height ) . 'px';
		}

		if ( '' !== $side_padding ) {
			if ( qode_framework_string_ends_with_space_units( $side_padding ) ) {
				$inner_styles['padding-left']  = $side_padding;
				$inner_styles['padding-right'] = $side_padding;
			} else {
				$inner_styles['padding-left']  = intval( $side_padding ) . 'px';
				$inner_styles['padding-right'] = intval( $side_padding ) . 'px';
			}
		}

		if ( ! empty( $border_color ) ) {
			$inner_styles['border-bottom-color'] = $border_color;

			if ( empty( $border_width ) ) {
				$inner_styles['border-bottom-width'] = '1px';
			}
		}

		if ( ! empty( $border_width ) ) {
			$inner_styles['border-bottom-width'] = intval( $border_width ) . 'px';
		}

		if ( ! empty( $border_style ) ) {
			$inner_styles['border-bottom-style'] = $border_style;
		}

		if ( ! empty( $inner_styles ) ) {
			$style .= qode_framework_dynamic_style( '#qodef-top-area-inner', $inner_styles );
		}

		return $style;
	}

	public function set_grid_class( $classes ) {
		if ( 'yes' === eskil_core_get_post_value_through_levels( 'qodef_top_area_header_in_grid' ) ) {
			$classes[] = 'qodef-content-grid';
		}

		return $classes;
	}
}

EskilCore_Top_Area::get_instance();
