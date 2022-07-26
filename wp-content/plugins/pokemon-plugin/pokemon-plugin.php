<?php
/*
Plugin Name:  Pokemon Plugin
Description:  Example plugin for the video tutorial series, "WordPress: Plugin Development", available at Lynda.com.
Plugin URI:   https://profiles.wordpress.org/specialk
Author:       Huras Alexandre
Version:      1.0
Text Domain:  pokemon-plugin
Domain Path:  /languages
License:      GPL v2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
*/


if (!defined('WPINC')) {
    exit;
}

define('PokePlugin_VERSION', '1.0.0');
define('PokePlugin_DOMAIN', 'pokemon-plugin');
define('PokePlugin_PATH', plugin_dir_path(__FILE__));

require_once( PokePlugin_PATH . '/post-types/register.php');
add_action('init', 'PokePlugin_register_pokemon_type');
add_action('init', 'PokePlugin_register_pokemon_event');

require_once( PokePlugin_PATH . '/taxonomies/register.php');
add_action('init', 'PokePlugin_register_type_taxonomy');

require_once( PokePlugin_PATH . '/custom-fields/register.php');
add_action( 'rest_api_init', 'Pokeplugin_add_new_fields' );

require_once( PokePlugin_PATH . '/includes/CMB2-functions.php');

function PokePlugin_register_everything(){
    PokePlugin_register_pokemon_type(); 
    PokePlugin_register_pokemon_event();
    PokePlugin_register_type_taxonomy();
}

function PokePlugin_rewrite_flush() {
    PokePlugin_register_everything();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'PokePlugin_rewrite_flush' );