=== Webcam Recorder, Video Converter & Video Uploader ===
Contributors: Clipchamp Pty Ltd
Donate link: https://clipchamp.com/pricing
Tags: video upload, webcam recorder, video transcoding, video conversion, video compression
Requires at least: 3.0.1
Tested up to: 4.5.3
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Collect videos and webcam recordings from your website's visitors. 
Compress videos by up to 1/20th of the original size.

== Description ==

The Clipchamp Video Uploader and Webcam Recorder adds the features of the [Clipchamp API](https://clipchamp.com/getthebutton) to your WordPress-based website.


By adding the Clipchamp short code to your WordPress posts and pages, you will be able to collect videos from your website's visitors or let them make webcam recordings.


The Clipchamp API will then compress and convert these videos into one of the supported video formats (MP4, WebM, WMV, FLV, GIF)
and upload them to one of the supported upload targets (WordPress Media Gallery, Amazon S3, Microsoft Azure, Google Drive, YouTube).


Unlike any other webcam recorder and video uploader, Clipchamp is based purely on HTML5, using the cutting-edge of modern web technologies.


It also compresses all videos and converts them into 1 standard format of your choice *before* they get uploaded to you. This reduces or even eliminates the need for server-side transcoding and involved costs.


All videos get sent directly to you and are neither processed on nor routed through Clipchamp servers, preserving your users' privacy. We [never have access](https://help.clipchamp.com/hc/en-us/articles/215476938-Does-Clipchamp-have-access-to-my-users-videos-) to your users' videos.


For a more in-depth description of the Clipchamp WordPress plugin refer to the [Clipchamp help centre article](https://help.clipchamp.com/hc/en-us/articles/221755028-What-is-the-Clipchamp-Plugin-for-WordPress-).


The source code of this plugin is available in [Clipchamp's Github repository](github.com/clipchamp/clipchamp-wordpress).

== Installation ==

This section describes how to install the Clipchamp Video Uploader and Webcam Recorder plugin and get it working.


1. Upload the plugin files to the `/wp-content/plugins/clipchamp` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Go to the [Clipchamp API pricing page](https://clipchamp.com/pricing) to subscribe to a Clipchamp plan
1. Use the Settings->Clipchamp screen to configure the plugin
1. Copy the API key from your [Clipchamp publisher portal](https://clipchamp.com/portal) and paste it into the respective field on the Settings->Clipchamp screen


For more information refer to [Clipchamp's help centre article](https://help.clipchamp.com/hc/en-us/articles/221593288-How-to-install-the-Video-Uploader-Webcam-Recorder-WordPress-Plugin).

== Frequently Asked Questions ==

= What can I do with the Clipchamp Video Uploader and Webcam Recorder plugin? =

This plugin lets you embed a button on your WordPress-based website that your visitors can click to either 1) record videos and upload to you or 2) upload video files they already have on their device. The plugin comes with a number of resolution (incl. 480p, 720p, 1080p), format (incl. MP4 and WebM) and compression (5 levels) options.

= How is the Clipchamp Video Uploader and Webcam recorder plugin different from a plain file uploader? =

Your users' video files get compressed & converted on the client before they get uploaded to you. As a result, you'll get much smaller files in 1 standard format of your choice (MP4, WebM, FLV,...). This dramatically reduces or even eliminates the huge costs involved in server-side video transcoding.

= Do my users' videos go through Clipchamp servers? =

No, all videos your users create get processed on your website visitors' client devices and uploaded from there straight to you. Clipchamp never sees or touches the files, you're in full control. Your users can thus safely submit any type of video to you - such as interview pitches, auditions, competition entries, feedback or educational videos.

= Is the Clipchamp technology purely based on HTML5? =

Yes, your users do not require Adobe Flash or other technologies for Clipchamp to work on their devices when visiting your website.

= Does this plugin work on mobile devices? =

Yes, it works across desktop and mobile versions of your website or web app and your users can create and upload videos on desktop and mobile devices. Content they create gets uploaded to your cloud storage.

== Screenshots ==

1. Allow your website's visitors to make a webcam recording.
1. Or let them upload video files they already have on their device.
1. Clipchamp enables your users to upload directly to your youtube channel, for example.
1. Clipchamp also supports upload to the WordPress Media Gallery, Amazon S3, Microsoft Azure and Google Drive.
1. The Clipchamp plugin allows you to automatically place a video upload button onto all pages and posts.
1. The Clipchamp button can be placed onto your pages and into posts by using a simple `[clipchamp]` short code, as well.

== Changelog ==

= 1.0.1 =
* Added support for the framerate API option

= 1.0 =
* Initial release of the Clipchamp video uploading and webcam recording plugin
