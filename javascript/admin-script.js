/**
 * Wrapper function to safely use $
 */
function ccbWrapper( $ ) {
    var ccb = {

        /**
         * Main entry point
         */
        init: function () {
            ccb.prefix      = 'ccb_';
            ccb.templateURL = $( '#template-url' ).val();
            ccb.ajaxPostURL = $( '#ajax-post-url' ).val();
            ccb.mediaUploader = null;

            // Init color picker
            $( '.color-field' ).wpColorPicker();

            ccb.registerEventHandlers();

            $( '.conditional-settings' ).hide();
            $(  '#' + $( '.output-select' ).val() + '_settings' ).show();

            //TODO:Disable fields when API key is not set
            if ( $( '#ccb_field-apiKey' ).val() == "" ) {
                $( '#ccb_settings input' ).attr('disabled', true);
            }
        },

        /**
         * Registers event handlers
         */
        registerEventHandlers: function () {
            $( '#upload-button' ).click( ccb.initMediaUploader );
            $( '#ccb_field-output' ).change( ccb.changeOutput );
        },

        /**
         * Initialize the media uploader
         *
         * @param object event
         */
        initMediaUploader: function( event ) {
            event.preventDefault();
            if ( ccb.mediaUploader ) {
                ccb.mediaUploader.open();
                return;
            }
            ccb.mediaUploader = wp.media.frames.file_frame = wp.media( {
                title: 'Choose Logo',
                button: {
                    text: 'Choose Logo'
                },
                multiple: false,
                library: {
                    type: 'image'
                }
            } );

            ccb.mediaUploader.on( 'select', function() {
                var attachment = ccb.mediaUploader.state().get( 'selection' ).first().toJSON();
                $( '.media-uploader' ).val( attachment.url );
            } );
            ccb.mediaUploader.open();
        },

        changeOutput: function( event ) {
            var output = $(event.target).val();
            $( '.conditional-settings' ).hide();
            $(  '#' + output + '_settings' ).show();
        }
    }; // end ccb

    $( document ).ready( ccb.init );

} // end ccbWrapper()

ccbWrapper( jQuery );
