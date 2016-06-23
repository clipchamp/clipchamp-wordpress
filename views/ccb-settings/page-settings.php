<div class="wrap">
	<div id="icon-options-general" class="icon32"><br /></div>
	<h1><?php esc_html_e( CCB_NAME ); ?> Settings</h1>

	<p>Include the button using the following shortcode: <code>[clipchamp]</code></p>

	<p>For more information refer to our <a href="https://clipchamp.com/forgeeks" target="_blank">documentation</a>.</p>

	<?php $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'general_settings'; ?>

	<h2 class="nav-tab-wrapper">
		<a href="?page=ccb_settings&tab=general_settings" class="nav-tab <?php echo $active_tab == 'general_settings' ? 'nav-tab-active' : ''; ?>">General Settings</a>
		<a href="?page=ccb_settings&tab=video_settings" class="nav-tab <?php echo $active_tab == 'video_settings' ? 'nav-tab-active' : ''; ?>">Video Settings</a>
	</h2>

	<form method="post" action="options.php">

		<?php if ( $active_tab == 'general_settings' ) : ?>

			<?php settings_fields( 'ccb_settings_general' ); ?>
			<?php do_settings_sections( 'ccb_settings_general' ); ?>

		<?php else : ?>

			<?php settings_fields( 'ccb_settings_video' ); ?>
			<?php do_settings_sections( 'ccb_settings_video' ); ?>

		<?php endif; ?>

		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes' ); ?>" />
			<input type="reset" name="reset" id="reset" class="button" value="<?php esc_attr_e( 'Reset' ); ?>" />
		</p>
	</form>
</div> <!-- .wrap -->
