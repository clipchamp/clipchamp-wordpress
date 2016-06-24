var ccbUploadVideo = function( blob, done, fail, notify ) {

	console.log( 'Video was successfully created!' );
	console.log( 'Uploading to WordPress...' );

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
		.done(function() {
			console.log( 'Upload successful!' );
			done();
		})
		.fail(function() {
			console.log( 'Upload failed!' );
			fail();
		});

};