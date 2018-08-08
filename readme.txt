=== Video Recorder, Video Converter & Video Uploader ===
Contributors: Clipchamp Pty Ltd
Donate link: https://clipchamp.com/en/pricing/collect-api
Tags: webcam recorder, video camera, video uploader, video converter, webcam, gravity forms
Requires at least: 4.0.0
Tested up to: 4.9.4
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Embed a video recording & uploading button in posts, pages and forms.
Collect videos and webcam recordings from your site's visitors. 

== Description ==

- Embed a video recorder & video uploader in 
..- posts 
..- pages 
..- forms created with Gravity Forms
- Collect videos and let users record webcam clips directly on your site. 

Either use the *Clipchamp Uploader* icon in the editor, the *Clipchamp Uploader* blocks widget in Gutenberg or the *Video Uploads* advanced field in Gravity Forms to insert the recorder.

Your visitors can record with their webcam or mobile device camera on-the-spot or upload an existing video file that they already have on their computer. You decide which input options to offer. All videos get directly submitted from users' devices to the upload target you enable in the plugin settings - YouTube, Google Drive, Dropbox, AWS S3, MS Azure or the WP Media Library.

Our HTML5 camera is based on the Clipchamp [video API](https://clipchamp.com/en/products/collect/video-api), bringing modern video recording, client-side transcoding and uploading to WordPress in one package - no Flash, no WebRTC. 

All plans inlcude a free trial for 14 days, no credit card required. At the end of the trial period, there are 4 plans to choose from, depending on the features you'd like to use and your expected video volume per month. 

Plans start at $29/month and you can upgrade, downgrade or cancel at any time. [Please see here](https://clipchamp.com/en/pricing/collect-api) for an overview of all plans and features.

Unlike other webcam recorders or video uploaders, Clipchamp is entirely HTML5 & JavaScript, using the cutting-edge of modern web technologies. Its client-side transcoding component reduces or even eliminates the need for server-side transcoding and involved costs - you receive video files that are streaming-ready and in a standard format. 

Clipchamp is unique insofar as it compresses and converts user-generated videos on the user device into one of the supported video formats (MP4, WebM, ASF, FLV) before files get uploadd to you. The videos your users record get submitted directly from their devices to an upload target you choose without any detours through our servers for better privacy protection - we [never have access](https://help.clipchamp.com/collect/api-features/does-clipchamp-have-access-to-my-users-videos) to your users' videos.

Our video recorder is in use on websites and in web apps across a broad range of industries such as education, online casting, recruiting, real estate, market research and sports video analysis. It's also a popular video tool for web design agencies for client projects. Send us a message at info(at)clipchamp.com for anything you'd like to clarify. Greetings from Brisbane and happy recording :-)

== Installation ==

This section describes how to install and set up the Video Uploader and Webcam Recorder plugin.

1. As with most plugins, you can install it through the WordPress plugins screen directly or upload the plugin files to the `/wp-content/plugins/clipchamp` directory.
2. Activate the plugin after installation, you'll be guided through the brief setup process.
3. As part of the setup, you'll have to log in or sign up to a Clipchamp API trial account
4. Make sure to set up your upload target credentials and whitelist your website domain(s) 
5. Configure the plugin in the WP backend in the last step - this includes options for input & output, visual appearance, etc.

For additional setup tips and more information please refer to [our help centre article](https://help.clipchamp.com/collect/wordpress-plugin/how-to-install-the-video-uploader-webcam-recorder-wordpress-plugin).

== Frequently Asked Questions ==

= What can I do with the Clipchamp Video Uploader and Webcam Recorder plugin? =

This plugin lets you collect user generated videos. It embeds a button on your WordPress-based website that your visitors can click to either 1) record videos and upload to you or 2) upload video files they already have on their device. The plugin comes with a number of resolution (incl. 480p, 720p, 1080p), format (incl. MP4 and WebM) and compression (5 levels) options.

= How is it different from a plain file uploader? =

Your users' video files get compressed & converted on the client before they get uploaded to you. As a result, you'll get much smaller files in 1 standard format of your choice (MP4, WebM, FLV,...). This dramatically reduces or even eliminates the huge costs involved in server-side video transcoding.

= Do my users' videos go through Clipchamp servers? =

No, all videos your users create get processed on your website visitors' devices and uploaded from there straight to you. Clipchamp never sees or touches the files, you're in full control. Your users can thus safely submit any type of video to you - such as interview pitches, auditions, competition entries, feedback or educational videos.

= Can I use this with Gravity Forms? =

Yes, we included a Gravity Forms integration in the latest version of the plugin. This means that you can create a form on your site and include a video recorder in the form.

= Does this plugin work on mobile devices? =

Yes, it works across desktop and mobile versions of your website or web app and your users can create and upload videos on desktop and mobile devices. Content they create gets uploaded to your cloud storage.

= Is it free? =

You can trial the plugin and all its features for free for 14 days, no credit card required. At the end of the trial period, there are 4 plans to choose from, depending on the features you'd like to use in your specific scenario and your expected video volume per month. Plans start at $29/month and you can upgrade, downgrade or cancel at any time. [Please see here](https://clipchamp.com/en/pricing/collect-api) for an overview of all plans and features.


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
