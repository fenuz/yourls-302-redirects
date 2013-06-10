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
    yourls_redirect($args[0], 302);
}
