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

			ccb.registerEventHandlers();
		},

		/**
		 * Registers event handlers
		 */
		registerEventHandlers: function () {

		}

	}; // end ccb

	$( document ).ready( ccb.init );

} // end ccbWrapper()

ccbWrapper( jQuery );
