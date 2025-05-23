<?php
if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}
?>
<div id="qode-variation-swatches-for-woocommerce-deactivation-modal">
	<div class="qodef-deactivation-modal-inner">
		<div class="qodef-deactivation-modal-content">
			<a class="qodef-deactivation-modal-close">
				<svg x="0px" y="0px" width="11px" height="11px" viewBox="0 0 11 11" enable-background="new 0 0 11 11" xml:space="preserve">
					<g>
						<path d="M0.288,9.678L4.419,5.5L0.288,1.32c-0.376-0.344-0.384-0.696-0.022-1.057c0.359-0.359,0.71-0.352,1.055,0.024L5.5,4.419
							l4.179-4.132c0.346-0.376,0.696-0.383,1.058-0.024c0.359,0.36,0.352,0.713-0.024,1.057L6.58,5.5l4.132,4.179
							c0.376,0.346,0.384,0.697,0.024,1.057c-0.361,0.36-0.712,0.353-1.058-0.023L5.5,6.58L1.32,10.711
							c-0.345,0.376-0.696,0.384-1.055,0.023C-0.097,10.375-0.088,10.024,0.288,9.678z"></path>
					</g>
				</svg>
			</a>
			<div class="qodef-deactivation-modal-header">
				<h2 class="qodef-deactivation-modal-title">
					<?php esc_html_e( 'Quick Feedback', 'qode-variation-swatches-for-woocommerce' ); ?>
				</h2>
			</div>
			<form class="qodef-deactivation-modal-form" method="post">
				<div class="qodef-deactivation-modal-form-caption">
					<p>
						<?php
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						printf(
							// translators: %s - Plugin name.
							esc_html__( 'If you have a moment, please share why you are deactivating %s:', 'qode-variation-swatches-for-woocommerce' ),
							esc_html( $plugin_name )
						);
						?>
					</p>
				</div>
				<div class="qodef-deactivation-modal-form-options">
					<div class="qodef-deactivation-modal-form-option">
						<input type="radio" id="qodef-deactivation-modal-form-option-no_longer_needed" class="qodef-deactivation-modal-form-option-input" name="reason_key" value="no_longer_needed"/>
						<label for="qodef-deactivation-modal-form-option-no_longer_needed" class="qodef-deactivation-modal-form-option-label">
							<span class="qodef-label-view"></span>
							<span class="qodef-label-text">
								<?php esc_html_e( 'I no longer need the plugin', 'qode-variation-swatches-for-woocommerce' ); ?>
							</span>
						</label>
					</div>
					<div class="qodef-deactivation-modal-form-option">
						<input type="radio" id="qodef-deactivation-modal-form-option-found_a_better_plugin" class="qodef-deactivation-modal-form-option-input" name="reason_key" value="found_a_better_plugin"/>
						<label for="qodef-deactivation-modal-form-option-found_a_better_plugin" class="qodef-deactivation-modal-form-option-label">
							<span class="qodef-label-view"></span>
							<span class="qodef-label-text">
								<?php esc_html_e( 'I found a better plugin', 'qode-variation-swatches-for-woocommerce' ); ?>
							</span>
						</label>
						<input type="text" class="qodef-deactivation-modal-form-option-text" name="reason_found_a_better_plugin" placeholder="<?php esc_attr_e( 'Please share which plugin', 'qode-variation-swatches-for-woocommerce' ); ?>">
					</div>
					<div class="qodef-deactivation-modal-form-option">
						<input type="radio" id="qodef-deactivation-modal-form-option-couldnt_get_plugin_to_work" class="qodef-deactivation-modal-form-option-input" name="reason_key" value="couldnt_get_plugin_to_work"/>
						<label for="qodef-deactivation-modal-form-option-couldnt_get_plugin_to_work" class="qodef-deactivation-modal-form-option-label">
							<span class="qodef-label-view"></span>
							<span class="qodef-label-text">
								<?php esc_html_e( 'I couldn\'t get plugin to work', 'qode-variation-swatches-for-woocommerce' ); ?>
							</span>
						</label>
					</div>
					<div class="qodef-deactivation-modal-form-option">
						<input type="radio" id="qodef-deactivation-modal-form-option-temporary_deactivation" class="qodef-deactivation-modal-form-option-input" name="reason_key" value="temporary_deactivation"/>
						<label for="qodef-deactivation-modal-form-option-temporary_deactivation" class="qodef-deactivation-modal-form-option-label">
							<span class="qodef-label-view"></span>
							<span class="qodef-label-text">
								<?php esc_html_e( 'This is a temporary deactivation', 'qode-variation-swatches-for-woocommerce' ); ?>
							</span>
						</label>
					</div>
					<div class="qodef-deactivation-modal-form-option">
						<input type="radio" id="qodef-deactivation-modal-form-option-<?php echo esc_attr( $plugin_slug ); ?>_premium" class="qodef-deactivation-modal-form-option-input" name="reason_key" value="<?php echo esc_attr( $plugin_slug ); ?>_premium"/>
						<label for="qodef-deactivation-modal-form-option-<?php echo esc_attr( $plugin_slug ); ?>_premium" class="qodef-deactivation-modal-form-option-label">
							<span class="qodef-label-view"></span>
							<span class="qodef-label-text">
								<?php
								// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								printf(
									// translators: %s - Plugin name.
									esc_html__( 'I have %s Premium', 'qode-variation-swatches-for-woocommerce' ),
									esc_html( $plugin_name )
								);
								?>
							</span>
						</label>
						<div class="qodef-deactivation-modal-form-option-text">
							<?php
							// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							printf(
								// translators: 1. Plugin name; 2. Plugin name; 3. Plugin name.
								esc_html__( 'Wait! Don\'t deactivate %1$s. You have to activate both %2$s and %3$s Premium in order for the plugin to work.', 'qode-variation-swatches-for-woocommerce' ),
								esc_html( $plugin_name ),
								esc_html( $plugin_name ),
								esc_html( $plugin_name )
							);
							?>
						</div>
					</div>
					<div class="qodef-deactivation-modal-form-option">
						<input type="radio" id="qodef-deactivation-modal-form-option-other" class="qodef-deactivation-modal-form-option-input" name="reason_key" value="other"/>
						<label for="qodef-deactivation-modal-form-option-other" class="qodef-deactivation-modal-form-option-label">
							<span class="qodef-label-view"></span>
							<span class="qodef-label-text">
								<?php esc_html_e( 'Other', 'qode-variation-swatches-for-woocommerce' ); ?>
							</span>
						</label>
						<input type="text" class="qodef-deactivation-modal-form-option-text" name="reason_other" placeholder="<?php esc_attr_e( 'Please share the reason', 'qode-variation-swatches-for-woocommerce' ); ?>">
					</div>
				</div>
				<div class="qodef-deactivation-modal-form-buttons">
					<button class="qodef-deactivation-modal-button qodef-deactivation-modal-button-submit qodef-btn qodef-btn-solid" ><?php esc_html_e( 'Submit & Deactivate', 'qode-variation-swatches-for-woocommerce' ); ?></button>
					<button class="qodef-deactivation-modal-button qodef-deactivation-modal-button-skip qodef-btn qodef-btn-simple"><?php esc_html_e( 'Skip & Deactivate', 'qode-variation-swatches-for-woocommerce' ); ?></button>
				</div>
				<?php wp_nonce_field( 'qode-variation-swatches-for-woocommerce-deactivation-nonce', 'qode-variation-swatches-for-woocommerce-deactivation-nonce' ); ?>
			</form>
		</div>
	</div>
</div>
