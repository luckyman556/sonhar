<?php

if ( ! function_exists( 'eskil_core_header_radio_to_select_options' ) ) {
	/**
	 * Function that convert radio boxes into array
	 *
	 * @param array $radio_array
	 *
	 * @return array
	 */
	function eskil_core_header_radio_to_select_options( $radio_array ) {
		$select_array = array( '' => esc_html__( 'Default', 'eskil-core' ) );

		foreach ( $radio_array as $key => $value ) {
			$select_array[ $key ] = $value['label'];
		}

		return $select_array;
	}
}
