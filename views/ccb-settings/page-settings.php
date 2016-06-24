<div class="wrap">
	<div id="icon-options-general" class="icon32"><br /></div>
	<h1><?php esc_html_e( CCB_NAME ); ?> Settings</h1>

	<p>Include the button using the following shortcode: <code>[clipchamp]</code></p>

	<p>For more information refer to our <a href="https://clipchamp.com/forgeeks" target="_blank">documentation</a>.</p>

	<form method="post" action="options.php">
		<?php settings_fields( 'ccb_settings' ); ?>
		<?php do_settings_sections( 'ccb_settings' ); ?>

		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes' ); ?>" />
			<input type="reset" name="reset" id="reset" class="button" value="<?php esc_attr_e( 'Reset' ); ?>" />
		</p>
	</form>
</div> <!-- .wrap -->
