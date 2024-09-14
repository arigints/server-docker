YOURLS Plugin: Upload and Shorten
=================================

Plugin for [YOURLS](http://yourls.org) (version 1.7 or newer)

Description
-----------
This plugin lets you upload a file to your webserver and automagically creates a YOURLS short-URL for it. Then you can share that file by its short link as well as its full URL.

Features
--------
  * Different ways to change the filename during the upload
  * Make a note about it for yourself in the YOURLS database (by default the title field is filled with the original filename and the alteration method)
  * Keep track of views/downloads via YOURLS´s history function
  * Localization support (currently: French, English, Spanish, German and Simplified Chinese. More translations provided by volounteers are greatly appreciated.)

Requirements
------------
What you need:

  * A webserver with PHP support
  * A functional installation of [YOURLS](http://yourls.org)
  * This Plugin ;-)
  * A bit of understanding what it does and what you can do with it ;-)

Installation
------------

  * Navigate to the folder `./user/plugins/` inside your YOURLS-install directory

  * Use any of these two ways to install:
    - **Either** clone this repo using `git`
    - **or** create a new folder named ´Upload-and-Shorten´, then download all files from here *into that directory*. 

  * Prepare your configuration:
    * If necessary create a directory where your files can be accessed from the webserver (i.e '/full/path/to/httpd/directory/')
    * Depending on your webserver´s setup you may have to modify the permissions of that directory:  
      - Make sure your webserver has read+write permissions for it. Explaining that is beyond the scope of this readme, please refer to the manual of your server, operating system or hosting provider. On a Linux box something like  
       `chown :www-data /full/path/to/httpd/directory &&  chmod g+rwx /full/path/to/httpd/directory`  
       should do the trick, but please don't rely on it.  
       **A correct server configuration is important for its functionality, but essential for its safety!**
    * Now open `./user/config.php` in your YOURLS-directory with any text editor and ...
      - add these definition lines and save the file:  
       `# Paths for plugin: "Upload-and-Shorten":`  
       `# The web URL path where YOURLS short-links will redirect to:`  
       `define( 'SHARE_URL', 'http://my.domain.tld/directory/' );`  
       `# The physical path where the plugin drops your files into:`  
       `define( 'SHARE_DIR', '/full/path/to/httpd/directory/' );` 
       (Adjust paths to your needs...)

  * Go to the Plugins Administration Page (eg. `http://sho.rt/admin/plugins.php`) and activate the plugin.

  * Have fun!

  * Consider helping with translations.

Bugs & Issues
-------------
No critical misbehaviour known, most issues are caused by configuration errors.
Beware of scripts and plugins which validate URLs or intercept the data flow. ~~Namely the plugin "Check URL" can interfere with this plugin,~~ (This issue has been fixed for basic setups, see [issue #11](https://github.com/fredl99/YOURLS-Upload-and-Shorten/issues/11).)  However, there might still occur interferences with plugins which check target URLs or manipulate the database by themselves. So, when you notice a strange behaviour always think about this and if you report an issue please include a list of installed and activated plugins.

Localization (l10n)
--------------------
This plugin supports **localization** (translations into your language). 
**For this to work you need at least YOURLS v1.7 from March 1, 2015**. It will basically work fine with earlier versions, except that translations won't work because of a minor bug in the YOURLS-code. Just upgrade to the latest YOURLS version and it will do. 

The default language is English. Translation files for French, German, Spanish and Simplified Chinese are included in the folder `l10n/`. To use this feature you just have to define your locale in `user/config.php` like this:  
`define( 'YOURLS_LANG', 'de_DE' );`  
(can be found within the standard YOURLS options there)

Looking for translators
-----------------------
If you're willing to provide translations, please [read this](http://blog.yourls.org/2013/02/workshop-how-to-create-your-own-translation-file-for-yourls/). If necessary you can contact me for further instructions. Any help is  appreciated, at most by your fellow countrymen!

Donations
---------
There are many ways to integrate this plugin into your daily routines. The more you use it the more you will discover. The more you discover the more you will like it.  
If you do, remember someone spends his time for improving it. If you want say thanks for that, just [buy him a coffee](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=H5B9UKVYP88X4). That will certainly motivate him to make further enhancements. Just for You! ...  
![](https://s.fredls.net/wjotnlsc1igvzq) and him :)

License
-------
**Free for personal use only.**  
If you want to make money with it you have to contact me first.  

Thanks for your attention.

