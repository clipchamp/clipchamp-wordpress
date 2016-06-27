<div class="wrap">
	<div id="icon-options-general" class="icon32"><br /></div>
    <div id="branding">
        <a href="https://clipchamp.com" target="_blank" class="logo"><img src="<?php echo plugins_url( 'images/logo.svg', dirname( dirname( __FILE__ ) ) ); ?>" alt="Clipchamp" /></a>
        <a href="https://clipchamp.com/pricing" target="_blank" class="btn">Sign up for the Clipchamp API</a>
    </div>
    <h1><?php esc_html_e( CCB_NAME ); ?> Settings</h1>

	<p>Include the button using the following shortcode: <code>[clipchamp]</code></p>

	<p>For more information refer to our <a href="https://clipchamp.com/forgeeks" target="_blank">documentation</a>.</p>

    <?php $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'appearance_settings'; ?>

	<form id="ccb_settings" method="post" action="options.php">
		<?php settings_fields( 'ccb_settings' ); ?>
		<?php do_settings_sections( 'ccb_settings' ); ?>

        <h2 class="nav-tab-wrapper">
            <a href="?page=ccb_settings&tab=appearance_settings" class="nav-tab <?php echo $active_tab == 'appearance_settings' ? 'nav-tab-active' : ''; ?>">Appearance</a>
            <a href="?page=ccb_settings&tab=video_settings" class="nav-tab <?php echo $active_tab == 'video_settings' ? 'nav-tab-active' : ''; ?>">Video</a>
            <a href="?page=ccb_settings&tab=behaviour_settings" class="nav-tab <?php echo $active_tab == 'behaviour_settings' ? 'nav-tab-active' : ''; ?>">Behaviour</a>
        </h2>

        <?php if ( strcmp( $active_tab, 'appearance_settings' ) == 0 ) : ?>
            <?php do_settings_sections( 'ccb_settings_appearance' ); ?>
        <?php endif; ?>

        <?php if ( strcmp( $active_tab, 'video_settings' ) == 0 ) : ?>
            <?php do_settings_sections( 'ccb_settings_video' ); ?>
            <div id="s3_settings" class="conditional-settings">
                <?php do_settings_sections( 'ccb_settings_s3' ); ?>
            </div>
            <div id="azure_settings" class="conditional-settings">
                <?php do_settings_sections( 'ccb_settings_azure' ); ?>
            </div>
            <div id="youtube_settings" class="conditional-settings">
                <?php do_settings_sections( 'ccb_settings_youtube' ); ?>
            </div>
            <div id="gdrive_settings" class="conditional-settings">
                <?php do_settings_sections( 'ccb_settings_gdrive' ); ?>
            </div>
        <?php endif; ?>

        <?php if ( strcmp( $active_tab, 'behaviour_settings' ) == 0 ) : ?>
            <?php do_settings_sections( 'ccb_settings_behaviour' ); ?>
        <?php endif; ?>

		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes' ); ?>" />
			<input type="reset" name="reset" id="reset" class="button" value="<?php esc_attr_e( 'Reset' ); ?>" />
		</p>
	</form>
</div> <!-- .wrap -->
