<?php
/*
Plugin Name: Reviews Feed
Plugin URI: https://smashballoon.com/reviews-feed
Description: Reviews Feeds allows you to display completely customizable Reviews feeds from many different providers.
Version: 1.1.1
Author: Smash Balloon
Author URI: http://smashballoon.com/
Text Domain: reviews-feed
Domain Path: /languages
*/

/*
Copyright 2024  Smash Balloon  (email: hey@smashballoon.com)
This program is paid software; you may not redistribute it under any
circumstances without the expressed written consent of the plugin author.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/
if (!defined('SBRVER')) {
	define('SBRVER', '1.1.1');
}

if (!defined('SBR_PLUGIN_DIR')) {
    define('SBR_PLUGIN_DIR', plugin_dir_path(__FILE__));
}

if (!defined('SBR_LITE')) {
    define('SBR_LITE', true);
}

if (!defined('SBR_PLUGIN_BASENAME')) {
	define('SBR_PLUGIN_BASENAME', plugin_basename(__FILE__));
}

require_once trailingslashit(SBR_PLUGIN_DIR) . 'bootstrap.php';