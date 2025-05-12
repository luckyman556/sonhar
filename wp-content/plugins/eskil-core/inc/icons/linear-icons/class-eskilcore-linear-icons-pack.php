<?php

if ( ! function_exists( 'eskil_core_add_linear_icons_to_collection' ) ) {
	/**
	 * Function that add icon font pack into the global list
	 *
	 * @param array $icons
	 *
	 * @return array
	 */
	function eskil_core_add_linear_icons_to_collection( $icons ) {
		$icons[] = 'EskilCore_Linear_Icons_Pack';

		return $icons;
	}

	add_filter( 'qode_framework_filter_add_icon', 'eskil_core_add_linear_icons_to_collection' );
}

if ( class_exists( 'QodeFrameworkIconPack' ) ) {
	class EskilCore_Linear_Icons_Pack extends QodeFrameworkIconPack {

		public function __construct() {
			parent::__construct();
		}

		public function add_icon_pack() {
			$this->set_base( 'linear-icons' );
			$this->set_name( 'Linear Icons' );
			$this->set_icons( $this->icons_array() );
			$this->set_specific_icons( $this->specific_icons() );
		}

		public function get_style_url() {
			return ESKIL_CORE_INC_URL_PATH . '/icons/' . $this->get_base() . '/assets/css/' . $this->get_base() . '.min.css';
		}

		private function icons_array() {
			return array(
				'lnr lnr-alarm'                => 'lnr lnr-alarm',
				'lnr lnr-apartment'            => 'lnr lnr-apartment',
				'lnr lnr-arrow-down'           => 'lnr lnr-arrow-down',
				'lnr lnr-arrow-down-circle'    => 'lnr lnr-arrow-down-circle',
				'lnr lnr-arrow-left'           => 'lnr lnr-arrow-left',
				'lnr lnr-arrow-left-circle'    => 'lnr lnr-arrow-left-circle',
				'lnr lnr-arrow-right'          => 'lnr lnr-arrow-right',
				'lnr lnr-arrow-right-circle'   => 'lnr lnr-arrow-right-circle',
				'lnr lnr-arrow-up'             => 'lnr lnr-arrow-up',
				'lnr lnr-arrow-up-circle'      => 'lnr lnr-arrow-up-circle',
				'lnr lnr-bicycle'              => 'lnr lnr-bicycle',
				'lnr lnr-bold'                 => 'lnr lnr-bold',
				'lnr lnr-book'                 => 'lnr lnr-book',
				'lnr lnr-bookmark'             => 'lnr lnr-bookmark',
				'lnr lnr-briefcase'            => 'lnr lnr-briefcase',
				'lnr lnr-bubble'               => 'lnr lnr-bubble',
				'lnr lnr-bug'                  => 'lnr lnr-bug',
				'lnr lnr-bullhorn'             => 'lnr lnr-bullhorn',
				'lnr lnr-bus'                  => 'lnr lnr-bus',
				'lnr lnr-calendar-full'        => 'lnr lnr-calendar-full',
				'lnr lnr-camera'               => 'lnr lnr-camera',
				'lnr lnr-camera-video'         => 'lnr lnr-camera-video',
				'lnr lnr-car'                  => 'lnr lnr-car',
				'lnr lnr-cart'                 => 'lnr lnr-cart',
				'lnr lnr-chart-bars'           => 'lnr lnr-chart-bars',
				'lnr lnr-checkmark-circle'     => 'lnr lnr-checkmark-circle',
				'lnr lnr-chevron-down'         => 'lnr lnr-chevron-down',
				'lnr lnr-chevron-down-circle'  => 'lnr lnr-chevron-down-circle',
				'lnr lnr-chevron-left'         => 'lnr lnr-chevron-left',
				'lnr lnr-chevron-left-circle'  => 'lnr lnr-chevron-left-circle',
				'lnr lnr-chevron-right'        => 'lnr lnr-chevron-right',
				'lnr lnr-chevron-right-circle' => 'lnr lnr-chevron-right-circle',
				'lnr lnr-chevron-up'           => 'lnr lnr-chevron-up',
				'lnr lnr-chevron-up-circle'    => 'lnr lnr-chevron-up-circle',
				'lnr lnr-circle-minus'         => 'lnr lnr-circle-minus',
				'lnr lnr-clock'                => 'lnr lnr-clock',
				'lnr lnr-cloud'                => 'lnr lnr-cloud',
				'lnr lnr-cloud-check'          => 'lnr lnr-cloud-check',
				'lnr lnr-cloud-download'       => 'lnr lnr-cloud-download',
				'lnr lnr-cloud-sync'           => 'lnr lnr-cloud-sync',
				'lnr lnr-cloud-upload'         => 'lnr lnr-cloud-upload',
				'lnr lnr-code'                 => 'lnr lnr-code',
				'lnr lnr-coffee-cup'           => 'lnr lnr-coffee-cup',
				'lnr lnr-cog'                  => 'lnr lnr-cog',
				'lnr lnr-construction'         => 'lnr lnr-construction',
				'lnr lnr-crop'                 => 'lnr lnr-crop',
				'lnr lnr-cross'                => 'lnr lnr-cross',
				'lnr lnr-cross-circle'         => 'lnr lnr-cross-circle',
				'lnr lnr-database'             => 'lnr lnr-database',
				'lnr lnr-diamond'              => 'lnr lnr-diamond',
				'lnr lnr-dice'                 => 'lnr lnr-dice',
				'lnr lnr-dinner'               => 'lnr lnr-dinner',
				'lnr lnr-direction-ltr'        => 'lnr lnr-direction-ltr',
				'lnr lnr-direction-rtl'        => 'lnr lnr-direction-rtl',
				'lnr lnr-download'             => 'lnr lnr-download',
				'lnr lnr-drop'                 => 'lnr lnr-drop',
				'lnr lnr-earth'                => 'lnr lnr-earth',
				'lnr lnr-enter'                => 'lnr lnr-enter',
				'lnr lnr-enter-down'           => 'lnr lnr-enter-down',
				'lnr lnr-envelope'             => 'lnr lnr-envelope',
				'lnr lnr-exit'                 => 'lnr lnr-exit',
				'lnr lnr-exit-up'              => 'lnr lnr-exit-up',
				'lnr lnr-eye'                  => 'lnr lnr-eye',
				'lnr lnr-file-add'             => 'lnr lnr-file-add',
				'lnr lnr-file-empty'           => 'lnr lnr-file-empty',
				'lnr lnr-film-play'            => 'lnr lnr-film-play',
				'lnr lnr-flag'                 => 'lnr lnr-flag',
				'lnr lnr-frame-contract'       => 'lnr lnr-frame-contract',
				'lnr lnr-frame-expand'         => 'lnr lnr-frame-expand',
				'lnr lnr-funnel'               => 'lnr lnr-funnel',
				'lnr lnr-gift'                 => 'lnr lnr-gift',
				'lnr lnr-graduation-hat'       => 'lnr lnr-graduation-hat',
				'lnr lnr-hand'                 => 'lnr lnr-hand',
				'lnr lnr-heart'                => 'lnr lnr-heart',
				'lnr lnr-heart-pulse'          => 'lnr lnr-heart-pulse',
				'lnr lnr-highlight'            => 'lnr lnr-highlight',
				'lnr lnr-history'              => 'lnr lnr-history',
				'lnr lnr-home'                 => 'lnr lnr-home',
				'lnr lnr-hourglass'            => 'lnr lnr-hourglass',
				'lnr lnr-inbox'                => 'lnr lnr-inbox',
				'lnr lnr-indent-decrease'      => 'lnr lnr-indent-decrease',
				'lnr lnr-indent-increase'      => 'lnr lnr-indent-increase',
				'lnr lnr-italic'               => 'lnr lnr-italic',
				'lnr lnr-keyboard'             => 'lnr lnr-keyboard',
				'lnr lnr-laptop'               => 'lnr lnr-laptop',
				'lnr lnr-laptop-phone'         => 'lnr lnr-laptop-phone',
				'lnr lnr-layers'               => 'lnr lnr-layers',
				'lnr lnr-leaf'                 => 'lnr lnr-leaf',
				'lnr lnr-license'              => 'lnr lnr-license',
				'lnr lnr-lighter'              => 'lnr lnr-lighter',
				'lnr lnr-line-spacing'         => 'lnr lnr-line-spacing',
				'lnr lnr-linearicons'          => 'lnr lnr-linearicons',
				'lnr lnr-link'                 => 'lnr lnr-link',
				'lnr lnr-list'                 => 'lnr lnr-list',
				'lnr lnr-location'             => 'lnr lnr-location',
				'lnr lnr-lock'                 => 'lnr lnr-lock',
				'lnr lnr-magic-wand'           => 'lnr lnr-magic-wand',
				'lnr lnr-magnifier'            => 'lnr lnr-magnifier',
				'lnr lnr-map'                  => 'lnr lnr-map',
				'lnr lnr-map-marker'           => 'lnr lnr-map-marker',
				'lnr lnr-menu'                 => 'lnr lnr-menu',
				'lnr lnr-menu-circle'          => 'lnr lnr-menu-circle',
				'lnr lnr-mic'                  => 'lnr lnr-mic',
				'lnr lnr-moon'                 => 'lnr lnr-moon',
				'lnr lnr-move'                 => 'lnr lnr-move',
				'lnr lnr-music-note'           => 'lnr lnr-music-note',
				'lnr lnr-mustache'             => 'lnr lnr-mustache',
				'lnr lnr-neutral'              => 'lnr lnr-neutral',
				'lnr lnr-page-break'           => 'lnr lnr-page-break',
				'lnr lnr-paperclip'            => 'lnr lnr-paperclip',
				'lnr lnr-paw'                  => 'lnr lnr-paw',
				'lnr lnr-pencil'               => 'lnr lnr-pencil',
				'lnr lnr-phone'                => 'lnr lnr-phone',
				'lnr lnr-phone-handset'        => 'lnr lnr-phone-handset',
				'lnr lnr-picture'              => 'lnr lnr-picture',
				'lnr lnr-pie-chart'            => 'lnr lnr-pie-chart',
				'lnr lnr-pilcrow'              => 'lnr lnr-pilcrow',
				'lnr lnr-plus-circle'          => 'lnr lnr-plus-circle',
				'lnr lnr-pointer-down'         => 'lnr lnr-pointer-down',
				'lnr lnr-pointer-left'         => 'lnr lnr-pointer-left',
				'lnr lnr-pointer-right'        => 'lnr lnr-pointer-right',
				'lnr lnr-pointer-up'           => 'lnr lnr-pointer-up',
				'lnr lnr-poop'                 => 'lnr lnr-poop',
				'lnr lnr-power-switch'         => 'lnr lnr-power-switch',
				'lnr lnr-printer'              => 'lnr lnr-printer',
				'lnr lnr-pushpin'              => 'lnr lnr-pushpin',
				'lnr lnr-question-circle'      => 'lnr lnr-question-circle',
				'lnr lnr-redo'                 => 'lnr lnr-redo',
				'lnr lnr-rocket'               => 'lnr lnr-rocket',
				'lnr lnr-sad'                  => 'lnr lnr-sad',
				'lnr lnr-screen'               => 'lnr lnr-screen',
				'lnr lnr-select'               => 'lnr lnr-select',
				'lnr lnr-shirt'                => 'lnr lnr-shirt',
				'lnr lnr-smartphone'           => 'lnr lnr-smartphone',
				'lnr lnr-smile'                => 'lnr lnr-smile',
				'lnr lnr-sort-alpha-asc'       => 'lnr lnr-sort-alpha-asc',
				'lnr lnr-sort-amount-asc'      => 'lnr lnr-sort-amount-asc',
				'lnr lnr-spell-check'          => 'lnr lnr-spell-check',
				'lnr lnr-star'                 => 'lnr lnr-star',
				'lnr lnr-star-empty'           => 'lnr lnr-star-empty',
				'lnr lnr-star-half'            => 'lnr lnr-star-half',
				'lnr lnr-store'                => 'lnr lnr-store',
				'lnr lnr-strikethrough'        => 'lnr lnr-strikethrough',
				'lnr lnr-sun'                  => 'lnr lnr-sun',
				'lnr lnr-sync'                 => 'lnr lnr-sync',
				'lnr lnr-tablet'               => 'lnr lnr-tablet',
				'lnr lnr-tag'                  => 'lnr lnr-tag',
				'lnr lnr-text-align-center'    => 'lnr lnr-text-align-center',
				'lnr lnr-text-align-justify'   => 'lnr lnr-text-align-justify',
				'lnr lnr-text-align-left'      => 'lnr lnr-text-align-left',
				'lnr lnr-text-align-right'     => 'lnr lnr-text-align-right',
				'lnr lnr-text-format'          => 'lnr lnr-text-format',
				'lnr lnr-text-format-remove'   => 'lnr lnr-text-format-remove',
				'lnr lnr-text-size'            => 'lnr lnr-text-size',
				'lnr lnr-thumbs-down'          => 'lnr lnr-thumbs-down',
				'lnr lnr-thumbs-up'            => 'lnr lnr-thumbs-up',
				'lnr lnr-train'                => 'lnr lnr-train',
				'lnr lnr-trash'                => 'lnr lnr-trash',
				'lnr lnr-underline'            => 'lnr lnr-underline',
				'lnr lnr-undo'                 => 'lnr lnr-undo',
				'lnr lnr-unlink'               => 'lnr lnr-unlink',
				'lnr lnr-upload'               => 'lnr lnr-upload',
				'lnr lnr-user'                 => 'lnr lnr-user',
				'lnr lnr-users'                => 'lnr lnr-users',
				'lnr lnr-volume'               => 'lnr lnr-volume',
				'lnr lnr-volume-high'          => 'lnr lnr-volume-high',
				'lnr lnr-volume-low'           => 'lnr lnr-volume-low',
				'lnr lnr-volume-medium'        => 'lnr lnr-volume-medium',
				'lnr lnr-warning'              => 'lnr lnr-warning',
				'lnr lnr-wheelchair'           => 'lnr lnr-wheelchair',
			);
		}

		function specific_icons() {
			return apply_filters(
				'eskil_core_filter_linear_specific_icons',
				array(
					'search'        => 'lnr-magnifier',
					'dropdown-cart' => 'lnr-cart',
					'menu'          => 'lnr-menu',
					'close'         => 'lnr-cross',
					'back-to-top'   => 'lnr-arrow-up',
					'mobile-menu'   => 'lnr-menu',
				)
			);
		}
	}
}
