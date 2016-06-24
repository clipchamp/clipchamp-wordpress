<?php
/*
 * General Section
 */
?>

<?php if ( 'ccb_field-apiKey' == $field['label_for'] ) : ?>

	<input id="<?php esc_attr_e( 'ccb_settings[general][field-apiKey]' ); ?>" name="<?php esc_attr_e( 'ccb_settings[general][field-apiKey]' ); ?>" class="regular-text" value="<?php esc_attr_e( $settings['general']['field-apiKey'] ); ?>" />
	<p class="description">Don't have an API key? Get one <a href="https://clipchamp.com/pricing" target="_blank">here</a>.</p>

<?php endif; ?>