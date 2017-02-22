=== Webcam Recorder, Video Converter & Video Uploader ===
Contributors: Clipchamp Pty Ltd
Donate link: https://clipchamp.com/pricing
Tags: video upload, webcam recorder, video transcoding, video conversion, video compression
Requires at least: 4.0.0
Tested up to: 4.7.2
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Collect videos and webcam recordings from your website's visitors. 
Compress videos to up to 1/20th of the original size.

== Description ==

By adding the short code [clipchamp] to any of your WordPress posts or pages, you can collect videos from your website's visitors and let them record videos in the frontend of your site.

That is, the Clipchamp Video Uploader and Webcam Recorder adds the features of the [Clipchamp API](https://clipchamp.com/api) to your WordPress-based website.

Clipchamp compresses and converts user generated videos on the client into one of the supported video formats (MP4, WebM, WMV, FLV, GIF)
and uploads them directly from your site visitors' device to an upload target you nominate - currently supported are Amazon S3, Microsoft Azure, Google Drive, YouTube and the WordPress Media Gallery.


Unlike any other webcam recorder and video uploader, Clipchamp is based purely on HTML5, using the cutting-edge of modern web technologies. It also compresses all videos and converts them into 1 standard format of your choice *before* they get uploaded to you. This reduces or even eliminates the need for server-side transcoding and involved costs.


All user generated videos get sent directly to you and are neither processed on nor routed through Clipchamp servers, protecting your users' privacy. We [never have access](https://help.clipchamp.com/hc/en-us/articles/215476938-Does-Clipchamp-have-access-to-my-users-videos-) to your users' videos.


For a more in-depth description of the Clipchamp WordPress plugin refer to the [Clipchamp help centre article](https://help.clipchamp.com/hc/en-us/articles/221755028-What-is-the-Clipchamp-Plugin-for-WordPress-).


The source code of this plugin is available in [Clipchamp's Github repository](github.com/clipchamp/clipchamp-wordpress).

== Installation ==

This section describes how to install and set up the Video Uploader and Webcam Recorder plugin.


1. Upload the plugin files to the `/wp-content/plugins/clipchamp` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Go to the [Clipchamp API pricing page](https://clipchamp.com/pricing/api-access) to subscribe to a plan (all include a free trial period)
4. Use the Settings->Clipchamp screen to configure the plugin
5. Copy the API key from your [Clipchamp publisher portal](https://clipchamp.com/api-settings) and paste it into the respective field on the Settings->Clipchamp screen


For additional setup tips and more information please refer to [our help centre article](https://help.clipchamp.com/hc/en-us/articles/221593288-How-to-install-the-Video-Uploader-Webcam-Recorder-WordPress-Plugin).

== Frequently Asked Questions ==

= What can I do with the Clipchamp Video Uploader and Webcam Recorder plugin? =

This plugin lets you collect user generated videos. It embeds a button on your WordPress-based website that your visitors can click to either 1) record videos and upload to you or 2) upload video files they already have on their device. The plugin comes with a number of resolution (incl. 480p, 720p, 1080p), format (incl. MP4 and WebM) and compression (5 levels) options.

= How is the Clipchamp Video Uploader and Webcam recorder plugin different from a plain file uploader? =

Your users' video files get compressed & converted on the client before they get uploaded to you. As a result, you'll get much smaller files in 1 standard format of your choice (MP4, WebM, FLV,...). This dramatically reduces or even eliminates the huge costs involved in server-side video transcoding.

= Do my users' videos go through Clipchamp servers? =

No, all videos your users create get processed on your website visitors' devices and uploaded from there straight to you. Clipchamp never sees or touches the files, you're in full control. Your users can thus safely submit any type of video to you - such as interview pitches, auditions, competition entries, feedback or educational videos.

= Is the Clipchamp technology purely based on HTML5? =

Yes, your users do not require Adobe Flash or other technologies for Clipchamp to work on their devices when visiting your website.

= Does this plugin work on mobile devices? =

Yes, it works across desktop and mobile versions of your website or web app and your users can create and upload videos on desktop and mobile devices. Content they create gets uploaded to your cloud storage.

== Screenshots ==

1. Allow your website's visitors to make a webcam recording.
1. Or let them upload video files they already have on their device.
1. Clipchamp enables your users to upload directly to your YouTube channel, for example.
1. Clipchamp also supports upload to the WordPress Media Gallery, Amazon S3, Microsoft Azure and Google Drive.
1. The Clipchamp plugin allows you to automatically place a video upload button onto all pages and posts.
1. The Clipchamp button can be placed onto your pages and into posts by using a simple `[clipchamp]` short code as well.

== Changelog ==

= 1.5.3 =
* Post thumbnails will be automatically created for video posts
* Before and after post created hooks available to inject custom JavaScript

= 1.5.2 =
* Fixed issue with post category assignment when not logged in

= 1.5.1 =
* Bug fixes for PHP warnings

= 1.5.0 =
* Added custom post type for videos uploaded through the Clipchamp API

= 1.0.2 =
* Added support for WordPress versions down to 4.0.0

= 1.0.1 =
* Added support for the framerate API option

= 1.0 =
* Initial release of the Clipchamp video uploading and webcam recording plugin
