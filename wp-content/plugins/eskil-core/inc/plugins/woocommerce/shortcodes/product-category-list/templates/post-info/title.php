<?php
$title_tag = isset( $title_tag ) && ! empty( $title_tag ) ? $title_tag : 'h2';
?>
<<?php echo esc_attr( $title_tag ); ?> class="woocommerce-loop-category__title" <?php qode_framework_inline_style( $this_shortcode->get_title_styles( $params ) ); ?>>
<a href="<?php echo get_term_link( $category_slug, 'product_cat' ); ?>">
	<span class="qodef-e-cat-count"><?php echo esc_html( $count ); ?></span>
	<span class="qodef-e-cat-title"><?php echo esc_html( $category_name ); ?></span>
</a>
</<?php echo esc_attr( $title_tag ); ?>>
