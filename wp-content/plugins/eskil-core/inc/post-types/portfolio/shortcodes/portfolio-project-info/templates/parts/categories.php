<?php
$categories = wp_get_post_terms( $project_id, 'portfolio-category' );

if ( ! empty( $categories ) ) { ?>
	<div class="qodef-e-category">
		<?php echo get_the_term_list( $project_id, 'portfolio-category', '', '<span class="qodef-info-separator-single"></span>' ); ?>
	</div>
<?php } ?>
