<?php
/*
Plugin Name:  Task Plugin
Description:  Example plugin for the video tutorial series, "WordPress: Plugin Development", available at Lynda.com.
Plugin URI:   https://profiles.wordpress.org/specialk
Author:       Huras Alexandre
Version:      1.0
Text Domain:  task-plugin
Domain Path:  /task-plugin
License:      GPL v2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
*/

if (!defined('WPINC')) {
    exit;
}

define('TaskPlugin_VERSION', '1.0.0');
define('TaskPlugin_DOMAIN', 'taskbook');
define('TaskPlugin_PATH', plugin_dir_path(__FILE__));

require_once( TaskPlugin_PATH . 'includes/posttypes.php');
register_activation_hook( __FILE__, 'taskbook_rewrite_flush' );

require_once( TaskPlugin_PATH . 'includes/roles.php');
register_activation_hook( __FILE__, 'taskbook_register_role' );
register_deactivation_hook( __FILE__, 'taskbook_unregister_role' );

// Add capabilities
register_activation_hook( __FILE__, 'taskbook_add_capabilities' );
register_deactivation_hook( __FILE__, 'taskbook_remove_capabilities' );


require_once( TaskPlugin_PATH . 'includes/status.php');

//Register CMB2 metaboxes and fields
require_once( TaskPlugin_PATH . 'includes/CMB2-functions.php');
