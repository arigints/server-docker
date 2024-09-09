<?php
/*
Plugin Name: Change error messages
Plugin URI: https://github.com/adigitalife/yourls-change-error-messages
Description: This plugin changes the error messages when a keyword or url already exists.  If a keyword already exists, the error message will display the URL for that keyword.  If the URL already exists, the share box will be displayed.
Version: 1.2.1
Author: Aylwin
Author URI: http://adigitalife.net/
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

// Hook our custom function into the 'add_new_link' filter
yourls_add_filter( 'add_new_link', 'change_error_messages' );

// If the keyword exists, display the long URL in the error message
function change_error_messages( $return, $url, $keyword, $title  ) {
	if ( isset( $return['code'] ) ) {
		if ( $return['code'] === 'error:keyword' ){
			$long_url = yourls_get_keyword_longurl( $keyword );
			if ($long_url){
				$return['message']	= 'The keyword "' . $keyword . '" already exists for: ' . $long_url;
			} elseif ( yourls_keyword_is_reserved( $keyword ) ){
							$return['message']	= "The keyword '" . $keyword . "' is reserved";
			}
		}
		elseif ( $return['code'] === 'error:url' ){
			if ($url_exists = yourls_url_exists( $url )){
				$keyword = $url_exists->keyword;
				$return['status']   = 'success';
				$return['message']	= 'This URL already has a short link: ' . YOURLS_SITE .'/'. $keyword;
				$return['title']    = $url_exists->title;
				$return['shorturl'] = YOURLS_SITE .'/'. $keyword;

			}
		}
	}
	return yourls_apply_filter( 'after_custom_error_message', $return, $url, $keyword, $title );
}
