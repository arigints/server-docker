302-instead
===========

YOURLS plugin to send a 302 (temporary) redirect instead of 301 (permanent) for sites where shortlinks may change. This is a fork of the original 302-instead plugin by BrettR, hosted on GitHub at the following URL:

https://github.com/EpicPilgrim/302-instead

The plugin adds a menu option to allow you to select the mode you want to use:
- 302 redirects for every URL (some clients may have old 301 redirects cached, you can't do much about that)
- 301 redirects for every URL (this is the default YOURLS behaviour)
- 302 redirects only for URLs that are not short URLs for the current YOURLS installation

Requirements

YOURLS 1.5+

Installation

    Create a user/plugins/302-instead directory in YOURLS
    Place the plugin.php file in above directory
    Activate plugin in YOURLS

You can also clone the git repository into your plugins directory. This will allow you to update the plugin more easily.
