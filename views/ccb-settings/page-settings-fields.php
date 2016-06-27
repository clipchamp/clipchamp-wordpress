<?php
/*
 * General Section
 */
?>

<?php if ( 'ccb_field-apiKey' == $field['label_for'] ) : ?>

	<input id="<?php esc_attr_e( 'ccb_settings[general][field-apiKey]' ); ?>" name="<?php esc_attr_e( 'ccb_settings[general][field-apiKey]' ); ?>" class="regular-text" value="<?php esc_attr_e( $settings['general']['field-apiKey'] ); ?>" />
	<p class="description">Don't have an API key? Get one <a href="https://clipchamp.com/pricing" target="_blank">here</a>.</p>

<?php endif; ?>

<?php if ( 'ccb_field-appendPost' == $field['label_for'] ) : ?>

	<p>
		<input id="<?php esc_attr_e( 'ccb_field-appendPost' ); ?>" name="<?php esc_attr_e( 'ccb_settings[general][field-appendPost]' ); ?>" type="checkbox" value="true" <?php checked( true, $settings['general']['field-appendPost'] ); ?> />
	</p>
	<p class="description">Automatically adds the clipchamp button to each post.</p>

<?php endif; ?>
