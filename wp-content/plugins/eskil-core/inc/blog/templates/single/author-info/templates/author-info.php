<?php
$is_enabled = eskil_core_get_post_value_through_levels( 'qodef_blog_single_enable_author_info' );

if ( 'yes' === $is_enabled && '' !== get_the_author_meta( 'description' ) ) {
	$author_id     = get_the_author_meta( 'ID' );
	$author_link   = get_author_posts_url( $author_id );
	$email_enabled = 'yes' === eskil_core_get_post_value_through_levels( 'qodef_blog_single_enable_author_info_email' );
	$user_socials  = eskil_core_get_author_social_networks_shorten();
	?>
	<div id="qodef-author-info" class="qodef-m">
		<div class="qodef-m-inner">
			<div class="qodef-m-image">
				<a itemprop="url" href="<?php echo esc_url( $author_link ); ?>">
					<?php echo get_avatar( $author_id, 170, array( 'height' => 170, 'width' => 120 ) ); ?>
				</a>
			</div>
			<div class="qodef-m-content">
				<h5 class="qodef-m-author vcard author">
					<a itemprop="url" href="<?php echo esc_url( $author_link ); ?>">
						<span class="fn"><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></span>
					</a>
				</h5>
				<?php if ( $email_enabled && is_email( get_the_author_meta( 'email' ) ) ) { ?>
					<p itemprop="email" class="qodef-m-email"><?php echo sanitize_email( get_the_author_meta( 'email' ) ); ?></p>
				<?php } ?>
				<p itemprop="description" class="qodef-m-description"><?php echo esc_html( strip_tags( get_the_author_meta( 'description' ) ) ); ?></p>
				<?php if ( ! empty( $user_socials ) ) { ?>
					<div class="qodef-m-social-icons">
						<?php
						foreach ( $user_socials as $network ) {
							$label = $network['label'];
							$short = $network['shorten'];
							$html  = '';

							$network_meta = get_the_author_meta( 'qodef_user_' . $label, $author_id );

							if ( ! empty( $network_meta ) ) {
								?>
								<a href="<?php echo esc_url( $network_meta ); ?>"><span><?php echo esc_html( $short ); ?></span></a>
								<?php
							}
						}
						?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>
