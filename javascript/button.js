var ccbUploadVideo = function( blob, done, fail, notify ) {
	var data = new FormData();
	data.append( 'action', 'ccb_upload' );
	data.append( 'video', blob );

	jQuery.ajax({
		xhr: function() {
			var xhr = new window.XMLHttpRequest();

			xhr.upload.addEventListener("progress", function(evt) {
				if (evt.lengthComputable) {
					var percentComplete = evt.loaded / evt.total;
					notify( percentComplete );
				}
			}, false);

			return xhr;
		},
		url : ccb_ajax.ajax_url,
		type: 'POST',
		data: data,
		contentType: false,
		processData: false
	})
		.done(function(response) {
			done(response);
		})
		.fail(function() {
			fail();
		});
};

var ccbPreviewAvailable = function(image) {
};

var ccbUploadComplete = function(data) {
	var data = {
        action: 'ccb_upload_complete',
        data: data
	};
    jQuery.post(ccb_ajax.ajax_url, data, function(response) {
    });
};