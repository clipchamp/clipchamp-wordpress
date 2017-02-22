<?php
/*
* Posts Section
*/
?>

<?php if ( 'ccb_field-show-with-posts' == $field['label_for'] ) : ?>

    <p>
        <input id="<?php esc_attr_e( 'ccb_field-show-with-posts' ); ?>" name="<?php esc_attr_e( 'ccb_settings[posts][field-show-with-posts][]' ); ?>" type="checkbox" value="1" <?php checked( true, $settings['field-show-with-posts'] ); ?> />
    </p>
    <p class="description">
        Include video posts in blog roll, categories etc.
    </p>

<?php endif; ?>

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

<?php if ( 'ccb_field-post-category' == $field['label_for'] ) : ?>

    <?php $categories = get_categories( array( 'hide_empty' => false ) ); ?>
    <select id="<?php esc_attr_e( 'ccb_field-post-category' ); ?>" name="<?php esc_attr_e( 'ccb_settings[posts][field-post-category]' ); ?>" class="output-select">
        <?php foreach ( $categories as $category ) : ?>
            <option value="<?php esc_attr_e( $category->term_id ); ?>" <?php selected( $settings['field-post-category'], $category->term_id ); ?>><?php esc_attr_e( $category->name ); ?></option>
        <?php endforeach; ?>
    </select>
    <p class="description">
        The default category of a post created after a video was uploaded.
    </p>

<?php endif; ?>

<?php if ( 'ccb_field-before-create-hook' == $field['label_for'] ) : ?>

    <textarea id="<?php esc_attr_e( 'ccb_field-before-create-hook' ); ?>" name="<?php esc_attr_e( 'ccb_settings[posts][field-before-create-hook]' ); ?>" rows="10" class="codemirror"><?php esc_attr_e( $settings['field-before-create-hook'] ) ?></textarea>
    <p class="description">
        The JavaScript code you specify here will be executed before a video post is created. You have access to the <code>data</code>
        variable, which includes information about the uploaded video. You can add WordPress post parameters to the data
        variable to store them with the video post (see
        <a href="https://developer.wordpress.org/reference/functions/wp_insert_post/" target="_blank">WordPress Code
            Reference</a>). Please always end your custom code with <code>return data;</code>.
    </p>

<?php endif; ?>

<?php if ( 'ccb_field-after-create-hook' == $field['label_for'] ) : ?>

    <textarea id="<?php esc_attr_e( 'ccb_field-after-create-hook' ); ?>" name="<?php esc_attr_e( 'ccb_settings[posts][field-after-create-hook]' ); ?>" rows="10" class="codemirror"><?php esc_attr_e( $settings['field-after-create-hook'] ) ?></textarea>
    <p class="description">
        The JavaScript code you specify here will be executed after a video post is created. You have access to the <code>postId</code>,
        <code>videoData</code> and <code>image</code> variables.
    </p>

<?php endif; ?>
