# Social Hotspot

Social Hotspot is a Facebook App works together with NoCatSplash on router flashed with DD-WRT firmware.

## Requirements

1. DD-WRT Router with NoCatSplash feature.
2. Hosting for Facebook App.

## Installation

1. Create Facebook App to get App ID and App Secret key.
2. Modify config.php.
    * APPID: Facebook App ID.
    * APPSECRET: Facebook App Secret.
    * PAGEID: Facebook Page ID.
    * BASEURL: Facebook App URL.
    * MESSAGE: Message which users must post in their timeline to use free Wi-Fi.
    * PORTAL: URL of NoCatSplash e.g. http://192.168.11.1:5280.
3. Modify Facebook Fan Box and source in index.php.
4. Upload Facebook App to your hosting.
5. Configure NoCatSplash settings.
    * Splash URL: Facebook App URL.
    * Allowed Web Hosts: You should find Facebook host values from HTML sources which host images, scripts when running your Facebook App because Facebook uses different CDN for static resources.

## Conclusion

NoCatSplash is no longer update so that it still have some bugs when running. Social Hotspot just demonstrates how to use Facebook App and NoCatSplash for users authentication on DD-WRT router.