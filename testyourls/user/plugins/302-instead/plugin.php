<?php

    /*
     Plugin Name: 302 Instead + 301 for YOURLS URLs
     Plugin URI: https://github.com/timcrockford/302-instead
     Description: Send a 302 (temporary) redirects that do not redirect to other short URLs and a 301 for YOURLS URLs
     Version: 1.2
     Author: BrettR / Tim Crockford
     Author URI: http://codearoundcorners.com/
     */

    if( !defined( 'YOURLS_ABSPATH' ) ) die();

    yourls_add_filter('redirect_code', 'temp_instead_function');
    yourls_add_action( 'plugins_loaded', 'temp_instead_admin_page_add' );

    // This function will check the URL and the HTTP status code of the passed
    // in arguments. If the URL happens to be an existing short URL on the same
    // YOURLS installation, it does nothing. Otherwise it will send a 302
    // redirect. Useful when you want to change the short URLs that end users
    // might be using but you can't change.
    
    function temp_instead_function($code, $url) {
        $match = strpos($url, yourls_site_url(false));
        $mode  = intval(yourls_get_option( 'temp_instead_mode', 1 ));
        
        // We check here if the url contains the YOURLS installation address,
        // and if it doesn't we'll return a 302 redirect if it isn't getting
        // one already.
        if ( $code != 302 && ($mode == 1 || ($match === false && $mode == 3))) {
            return 302;
        }

        // We check here if the url contains the YOURLS installation address,
        // and if it does we'll return a 301 redirect if it isn't getting
        // one already.
        if ( $code != 301 && ($mode == 2 || ($match !== false && $mode == 3))) {
            return 301;
        }

        return $code;
    }
    
    // Register our plugin admin page
    function temp_instead_admin_page_add() {
        yourls_register_plugin_page( 'temp_instead', 'Redirect Rules', 'temp_instead_admin_page_do' );
    }
    
    // Display admin page
    function temp_instead_admin_page_do() {
        if( isset( $_POST['temp_instead_mode'] ) ) {
            yourls_verify_nonce( 'temp_instead' );
            temp_instead_admin_page_update();
        }
        
        $mode = intval(yourls_get_option( 'temp_instead_mode', 1 ));
        $nonce = yourls_create_nonce( 'temp_instead' );
        
        // If the option hasn't been added previously, we add the default value of everything using
        // 302 redirects.
        echo '<h2>302-Redirect Redirection Rules</h2>';
        echo '<p>This plugin allows you to configure how the 302-redirect plugin operates.</p>';
        echo '<form method="post">';
        echo '<input type="hidden" name="nonce" value="' . $nonce . '" />';
        
        echo '<label for="temp_instead_mode">Select Redirect Mode:</label>';
        echo '<select id="temp_instead_mode" name="temp_instead_mode">';
        
        $opt1 = ( $mode == 1 ? ' selected' : '');
        $opt2 = ( $mode == 2 ? ' selected' : '');
        $opt3 = ( $mode == 3 ? ' selected' : '');
        
        echo '<option value=1' . $opt1 . '>Redirect all using 302 temporary redirect</option>';
        echo '<option value=2' . $opt2 . '>Redirect all using 301 permanent redirect</option>';
        echo '<option value=3' . $opt3 . '>Redirect full URLs using 302 and short URLs using 301</option>';
        
        echo '<p><input type="submit" value="Update Redirect Mode" /></p>';

        echo '</select>';
        echo '</form>';
    }
    
    // Update option in database
    function temp_instead_admin_page_update() {
        $mode = $_POST['temp_instead_mode'];
        
        if( $mode ) {
            $mode = intval($mode);
            
            if ( yourls_get_option( 'temp_instead_mode' ) !== false ) {
                echo '<b>Redirect mode was updated successfully.</b>';
                yourls_update_option( 'temp_instead_mode', $mode );
            } else {
                echo '<b>Redirect mode was stored successfully.</b>';
                yourls_add_option( 'temp_instead_mode', $mode );
            }
        }
    }
?>