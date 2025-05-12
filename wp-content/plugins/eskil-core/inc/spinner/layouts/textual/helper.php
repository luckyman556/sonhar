<?php

if ( ! function_exists( 'eskil_core_add_textual_spinner_layout_option' ) ) {
    /**
     * Function that set new value into page spinner layout options map
     *
     * @param array $layouts - module layouts
     *
     * @return array
     */
    function eskil_core_add_textual_spinner_layout_option( $layouts ) {
        $layouts['textual'] = esc_html__( 'Textual', 'eskil-core' );

        return $layouts;
    }

    add_filter( 'eskil_core_filter_page_spinner_layout_options', 'eskil_core_add_textual_spinner_layout_option' );
}

if ( ! function_exists( 'eskil_core_set_textual_spinner_layout_as_default_option' ) ) {
    /**
     * Function that set default value for page spinner layout options map
     *
     * @param string $default_value
     *
     * @return string
     */
    function eskil_core_set_textual_spinner_layout_as_default_option( $default_value ) {
        return 'textual';
    }

    add_filter( 'eskil_core_filter_page_spinner_default_layout_option', 'eskil_core_set_textual_spinner_layout_as_default_option' );
}
