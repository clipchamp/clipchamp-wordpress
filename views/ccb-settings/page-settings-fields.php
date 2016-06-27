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

    <?php $args = array( 'public' => true ); ?>

	<?php foreach ( get_post_types( $args, 'objects' ) as $key => $post_type ) : ?>
		<p>
			<input id="<?php esc_attr_e( 'ccb_field-appendPost-' . $key ); ?>" name="<?php esc_attr_e( 'ccb_settings[general][field-appendPost][]' ); ?>" type="checkbox" value="<?php esc_attr_e( $key ); ?>" <?php checked( true, in_array( $key, $settings['general']['field-appendPost'] ) ); ?> />
			<label for="<?php esc_attr_e( 'ccb_field-appendPost-' . $key ); ?>"><?php esc_attr_e( $post_type->labels->name ); ?></label>
		</p>
	<?php endforeach; ?>
	<input name="<?php esc_attr_e( 'ccb_settings[general][field-appendPost][]' ); ?>" type="hidden" value=""  />
	<p class="description">Automatically adds the clipchamp button to each post of the selected post type.</p>

<?php endif; ?>
