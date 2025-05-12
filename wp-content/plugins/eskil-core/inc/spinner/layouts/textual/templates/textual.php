<?php
    $spinner_text  = eskil_core_get_post_value_through_levels( 'qodef_page_spinner_text' );
?>

<div class="qodef-m-textual">
    <div class="qodef-m-text">
        <?php esc_html_e( $spinner_text, 'eskil-core' ); ?>
    </div>
</div>