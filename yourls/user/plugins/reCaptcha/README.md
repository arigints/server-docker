reCaptcha
====================

Plugin for [YOURLS](http://yourls.org) v1.7 (possibly earlier, not tested) adding reCaptcha or SolveMedia captcha to public page

Description
-----------
Spam protection for public YOURLS installations. Any unauthenticated user is required to pass a reCaptcha or SolveMedia captcha in order to create a shortlink. 

Installation
------------
1. In `/user/plugins`, create a new folder named reCaptcha.
2. Drop the plugin.php file in that directory.
3. Go to the Plugins administration page ( *eg* `http://sho.rt/admin/plugins.php` ) and activate the plugin.
4. 
4a. (reCaptcha) Sign up for a reCaptcha key at [Google](https://www.google.com/recaptcha/admin)
4b. (SolveMedia) Sign up for a Solve Media key at [Solve Media](https://portal.solvemedia.com/portal/public/signup)
5. On the Plugins administration page > reCapture Settings paste in your reCaptcha keys
6. 
6a. (reCaptcha) In your public front front page PHP file paste the following code where you want the reCaptcha displayed
      spb_recaptcha_add_Captcha_Script();
6b. (SolveMedia) In your public front front page PHP file paste the following code where you want the reCaptcha displayed
      spb_recaptcha_add_SolveMedia_Script();

Notes
-----
There is a sample public front page PHP file in the repository.
The captcha will only show for non-logged in users. Log out of admin or open a private browsing session to check that it works.

License
-------
Attribution-ShareAlike 4.0 International (CC BY-SA 4.0) https://creativecommons.org/licenses/by-sa/4.0/