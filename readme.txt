=== Clipchamp Video Converter, Video Uploader and Webcam Recorder ===
Contributors: thillmann, sbalko74
Donate link: https://clipchamp.com/pricing
Tags: video upload, webcam recording, video transcoding, video conversion, video compression
Requires at least: 3.0.1
Tested up to: 4.5.3
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Collect videos and webcam recordings from your website's visitors using the Clipchamp API. 
Compress videos by up one 20th of the original size and convert videos to MP4, WebM, WMV, or GIF prior to uploading. 
Supports uploading videos to the Wordpress Media Gallery, Amazon S3, Microsoft Azure, Google Drive, and YouTube.

== Description ==

The Clipchamp Video Uploader and Webcam Recorder adds the features of the [Clipchamp API](https://clipchamp.com/getthebutton) to your Wordpress-based website.
By adding the Clipchamp short code to your Wordpress posts and pages, you will be able to collect videos from your website's visitors or
let them make webcam recordings. The Clipchamp API will then compress and convert these videos into one of the supported video formats (MP4, WebM, WMV, GIF)
and upload them to one of the supported upload targets (Wordpress Media Gallery, Amazon S3, Microsoft Azure, Google Drive, YouTube).

== Installation ==

This section describes how to install the Clipchamp Video Uploader and Webcam Recorder plugin and get it working.

1. Upload the plugin files to the `/wp-content/plugins/clipchamp` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Go to the [Clipchamp API pricing page](https://clipchamp.com/pricing) to subscribe to a Clipchamp plan
1. Use the Settings->Clipchamp screen to configure the plugin
1. Copy the API key from your [Clipchamp publisher portal](https://clipchamp.com/portal) and paste it into respective field on the Settings->Clipchamp screen 


== Frequently Asked Questions ==

= What can I do with the Clipchamp Video Uploader and Webcam Recorder plugin? =

The Clipchamp API lets you embed a button on your WordPress-based website that your visitors can click to either 1) record videos and upload to you or 2) upload video files they already have on their device. The API comes with a number of resolution (incl. 480p, 720p, 1080p), format (incl. MP4 and WebM) and compression (5 levels) options.

= How is the Clipchamp Video Uploader and Webcam recorder plugin different from a plain file uploader? =

Your users' video files get compressed & converted on the client before they get uploaded to you. As a result, you'll get much smaller files in 1 standard format of your choice (MP4, WebM, FLV,...). This dramatically reduces or even eliminates the huge costs involved in server-side video transcoding.

= Do my users' videos go through Clipchamp servers? =

No, all videos your users create get processed on the your website visitors' client devices and uploaded from there straight to you. Clipchamp never sees or touches the files, you're in full control. Your users can thus safely submit any type of video to you - such as interview pitches, auditions, competition entries, feedback or educational videos.

= Is the Clipchamp technology purely based on HTML5? =

Yes, your users do not require Adobe Flash or other technologies for Clipchamp to work on their devices when visiting your website.

= Does the Clipchamp API work on mobile devices? =

Yes, it works across desktop and mobile versions of your website or web app and your users can create and upload videos on desktop and mobile devices. Content they create gets uploaded to your cloud storage. U

== Screenshots ==

1. Allow your website's visitors to make a webcam recording. 
1. The Clipchamp user interface can placed onto your pages and post by using a simple `[clipchamp]` short code.
1. The Clipchamp plugin also allows to automatically place a video upload facility onto all pages and posts.
1. Upload your users' files to the WordPress Media Gallery, Amazon S3, Microsoft Azure, Google Drive, or YouTube. 

== Changelog ==

= 0.1 =
* Initial beta release of the Clipchamp video uploading and webcam recording plugin
