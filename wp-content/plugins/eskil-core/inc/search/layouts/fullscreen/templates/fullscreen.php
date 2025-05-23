<div class="qodef-fullscreen-search-holder qodef-m">
	<div class="qodef-fullscreen-search-content">
		<?php
		eskil_core_get_opener_icon_html(
			array(
				'option_name'  => 'search',
				'custom_class' => 'qodef-m-close',
				'custom_icon'  => 'search',
			),
			false,
			true
		);
		?>
		<div class="qodef-m-inner">
			<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="qodef-m-form" method="get">
				<input type="text" placeholder="<?php esc_attr_e( 'Search', 'eskil-core' ); ?>" name="s" class="qodef-m-form-field" autocomplete="off" required/>
				<?php
				eskil_core_get_opener_icon_html(
					array(
						'html_tag'     => 'button',
						'option_name'  => 'search',
						'custom_icon'  => 'search',
						'custom_class' => 'qodef-m-form-submit',
					)
				);
				?>
				<div class="qodef-m-form-line"></div>
			</form>
		</div>
	</div>
</div>
