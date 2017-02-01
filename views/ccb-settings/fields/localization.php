<?php
/*
* Localization Section
*/
?>

<?php if ( 'ccb_field-btn_cancel_upload' == $field['label_for'] ) : ?>

    <input id="<?php esc_attr_e( 'ccb_field-btn_cancel_upload' ); ?>" name="<?php esc_attr_e( 'ccb_settings[localization][field-btn_cancel_upload]' ); ?>" class="regular-text" value="<?php esc_attr_e( $settings['field-btn_cancel_upload'] ); ?>" />

<?php endif; ?>
