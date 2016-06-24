<?php
/*
 * Video Section
 */
?>

<?php if ( 'ccb_field-enable' == $field['label_for'] ) : ?>

    <?php foreach ($default_sets['enable'] as $enable => $enableLabel ) : ?>
        <p>
            <input id="<?php esc_attr_e( 'ccb_field-enable-' . $enable ); ?>" name="<?php esc_attr_e( 'ccb_settings[behaviour][field-enable][]' ); ?>" type="checkbox" value="<?php esc_attr_e( $enable ); ?>" <?php checked( true, in_array( $enable, $settings['field-enable'] ) ); ?> />
            <label for="<?php esc_attr_e( 'ccb_field-enable-' . $enable ); ?>"><?php esc_attr_e( $enableLabel ); ?></label>
        </p>
        <p class="description">
            <?php
                switch ( $enable ) {
                    case 'batch':
                        esc_attr_e( 'Allow multiple files to be processed and uploaded in sequence without further user interaction.' );
                        break;
                    case 'mobile-webcam-format-fallback':
                        esc_attr_e( 'Enable compression of webcam recordings on mobile devices even when the target format is not available (experimental). This feature is currently restricted to Chrome on Android where with this flag, the Clipchamp API produces WebM files using the VP8 or VP9 video codec.' );
                        break;
                    case 'no-branding':
                        esc_attr_e( 'Remove Clipchamp branding from the UI, if available in your plan.' );
                        break;
                    case 'no-error-bypass':
                        esc_attr_e( 'If transcoding fails for whatever reason, normally Clipchamp would resort to simply uploading the input file as is. This flag suppresses that behavior. The most common cause for transcoding failures are unsupported input codecs.' );
                        break;
                    case 'no-hidden-run':
                        esc_attr_e( 'Disable the option to continue processing and uploading in the background if the user closes the window after clicking submit.' );
                        break;
                    case 'no-popout':
                        esc_attr_e( 'Some browsers block the use of certain features for third party code, when this is detected Clipchamp will open a new window in order to gain access to these features. Setting no-popout suppresses this behavior, and forces Clipchamp to try to make do with what\'s available. This might lead to increased memory requirements, among other things.' );
                        break;
                    case 'no-probe-reject':
                        esc_attr_e( 'In case we are unable to determine that an input file is a video it would normally be rejected. This option accepts all input files and skips straight to upload for non-video files.' );
                        break;
                    case 'no-thank-you':
                        esc_attr_e( 'Disable the thank you screen and close window immediately. If there were any errors encountered during the process the last screen will still be displayed.' );
                        break;
                }
            ?>
        </p>
    <?php endforeach; ?>
    <input name="<?php esc_attr_e( 'ccb_settings[behaviour][field-enable][]' ); ?>" type="hidden" value=""  />

<?php endif; ?>

<?php if ( 'ccb_field-experimental' == $field['label_for'] ) : ?>

    <?php foreach ($default_sets['experimental'] as $experimental => $experimentalLabel ) : ?>
        <p>
            <input id="<?php esc_attr_e( 'ccb_field-experimental-' . $experimental ); ?>" name="<?php esc_attr_e( 'ccb_settings[behaviour][field-experimental][]' ); ?>" type="checkbox" value="<?php esc_attr_e( $experimental ); ?>" <?php checked( true, in_array( $experimental, $settings['field-experimental'] ) ); ?> />
            <label for="<?php esc_attr_e( 'ccb_field-experimental-' . $experimental ); ?>"><?php esc_attr_e( $experimentalLabel ); ?></label>
        </p>
        <p class="description">
            <?php
            switch ( $experimental ) {
                case 'force-popout':
                    esc_attr_e( 'Always launch the user interface of the Clipchamp API in a separate "popout" browser window, even if it could run inside an iframe inside the embedding website\'s DOM. Must not be used in conjunction with the no-popout flag (enable) parameter.' );
                    break;
                case 'overlong-recording':
                    esc_attr_e( 'Allow webcam/mobile camera recordings without any timely limitation of the recording duration (as otherwise enforced by the Clipchamp API). The recording duration can still be deliberately limited by setting a numeric value (number of seconds) in the camera.limit parameter. Clients need to make sure to only set the overlong-recording flag in supported browsers (currently: Chrome, Opera, and Firefox).' );
                    break;
                case 'h264-hardware-acceleration':
                    esc_attr_e( 'Enable hardware-accelerated H.264 video encoding on supported platforms (currently: x86-based ChromeOS/Chromebook devices). The flag only applies to the web (default) preset and the mp4 (default) format. Depending on the underlying hardware, a multiple times speedup can be attained when setting the h264-hardware-acceleration flag. Clients will experience different compression ratio for the same (subjective) perceived output quality and are thus encouraged to adjust the compression parameter to yield an acceptable quality/compression tradeoff.' );
                    break;
            }
            ?>
        </p>
    <?php endforeach; ?>
    <input name="<?php esc_attr_e( 'ccb_settings[behaviour][field-experimental][]' ); ?>" type="hidden" value=""  />

<?php endif; ?>
