<?php if ( ! empty( $taxonomy_items ) ) { ?>
	<div class="qodef-e-designer-list">
		<?php foreach ( $taxonomy_items as $taxonomy_item ) { ?>
			<div class="qodef-e-designer-list-item">
				<a class="qodef-e-item-link"  href="<?php echo esc_html( get_term_link( $taxonomy_item ) ) ?>"><?php echo esc_html( $taxonomy_item->name ); ?></a>
			</div>
		<?php } ?>
	</div>
<?php }