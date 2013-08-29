<?php
/*
Plugin Name: 302 Redirects 
Plugin URI: http://www.kennisnet.nl 
Description: Use 302 redirects to prevent browser caching keyword redirects. 
Version: 1.0
Author: Frank Matheron <frankmatheron@gmail.com>
Author URI: https://www.github.com/fenuz 
*/

// use 302 redirects on shorturl keyword redirections (default yourls)
yourls_add_action('redirect_shorturl', '_302_redirect_shorturl');
function _302_redirect_shorturl($args) {
    if (_302_redirect_log()) {
        // Update click count in main table
        yourls_update_clicks($args[1]);

        // Update detailed log for stats
        yourls_log_redirect($args[1]);
    }
    // do redirect
    yourls_redirect($args[0], 302);
}

// only log redirects on YOURLS 1.6 or higher, on lower versions 
// yourls will have already logged the redirect.
function _302_redirect_log() {
    $version = explode('.', yourls_sanitize_version(YOURLS_VERSION));
    return !empty($version) && ($version[0] > 1 || $version[1] >= 6);
}
