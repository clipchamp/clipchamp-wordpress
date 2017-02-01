<?php
/*
* Posts Section
*/
?>

<?php if ( 'ccb_field-post-status' == $field['label_for'] ) : ?>

    <select id="<?php esc_attr_e( 'ccb_field-post-status' ); ?>" name="<?php esc_attr_e( 'ccb_settings[posts][field-post-status]' ); ?>" class="output-select">
        <?php foreach ( $default_sets['post_statuses'] as $status => $statusLabel ) : ?>
            <option value="<?php esc_attr_e( $status ); ?>" <?php selected( $settings['field-post-status'], $status ); ?>><?php esc_attr_e( $statusLabel ); ?></option>
        <?php endforeach; ?>
    </select>
    <p class="description">
        The status of a post created after a video was uploaded.
    </p>

<?php endif; ?>