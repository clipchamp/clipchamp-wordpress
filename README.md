# Clipchamp Plugin for WordPress
WordPress plugin to enable the [Clipchamp video API](https://clipchamp.com/en/api) in WordPress.

## What is the Clipchamp API? ##

The Clipchamp API lets you embed a webcam recorder on your website so that visitors can record & upload videos to you. 

It comes with a number of resolution, format and video compression options. Your users' video files get transcoded on the client before they get uploaded to you. You'll get smaller files - which upload faster - in 1 standard format of your choice (MP4, WebM, FLV,...). 

This reduces or even eliminates costs involved in server-side video transcoding. It works in desktop and mobile browsers and users can also upload videos they already have on their device.

## Installation ##

1. Clone the repository including its submodule:
   
   ```
   git clone --recursive git@github.com:clipchamp/clipchamp-wordpress.git
   ```
1. Zip up the entire repository (and its submodule) into a ZIP file:
   
   ```
   zip -r clipchamp-wordpress.zip clipchamp-wordpress/
   ```
1. Upload the zip file to your WordPress blog (Plugins -> Add New -> Upload Plugin).
1. Install the plugin and activate it.
1. If you don't have an API key yet, [subscribe to a free trial](https://clipchamp.com/en/pricing/api-access).
1. Copy and paste your API key into the respective field in the plugin settings (Settings -> Clipchamp).
