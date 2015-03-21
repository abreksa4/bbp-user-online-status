<?php
/*
Plugin Name: bbp user online status
Plugin URL: https://github.com/abreksa4/bbp-user-online-status
Description: displays user's online/offline status in bbpress topics/replies
Version: 1.0
Author: Andrew Breksa
Author URI: https://github.com/abreksa4
Contributors: Parts of code adapted from Robin Wilson's bbp profile information and from http://wordpress.stackexchange.com/questions/34429/how-to-check-if-a-user-not-current-user-is-logged-in

*/


/*******************************************
* global variables
*******************************************/

// load the plugin options
$bbpuos_options = get_option( 'bbpuos_settings' );

if(!defined('bbpuos_PLUGIN_DIR'))
	define('bbpuos_PLUGIN_DIR', dirname(__FILE__));




/*******************************************
* file includes
*******************************************/

include(bbpuos_PLUGIN_DIR . '/includes/settings.php');
include(bbpuos_PLUGIN_DIR . '/includes/display.php');





