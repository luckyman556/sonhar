<?php

get_header();

$params                  = array();
$params['template_slug'] = 'shortcode';

// Include cpt content template
eskil_core_template_part( 'post-types/portfolio', 'templates/content', '', $params );

get_footer();
