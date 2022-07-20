<?php
/*
Plugin Name:  Single Post CTA
Description:  Example plugin for the video tutorial series, "WordPress: Plugin Development", available at Lynda.com.
Plugin URI:   https://profiles.wordpress.org/specialk
Author:       Huras Alexandre
Version:      1.0
Text Domain:  spc
Domain Path:  /spc
License:      GPL v2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
*/

if (!defined('ABSPATH')) {
    exit;
}

define('spc_PATH', plugin_dir_url(__FILE__));

add_action('wp_enqueue_scripts', 'spc_load_stylesheet');
function spc_load_stylesheet() {
    if(is_single()){ //Check if we are rendering a single post to only load the css when the file is needed
        wp_enqueue_style( 'spc stylesheet', spc_PATH . 'spc-styles.css');
    }
}

add_action('widgets_init', 'spc_register_sidebar');
function spc_register_sidebar() {
    register_sidebar( array(
        'name'          => __( 'Single Post CTA', 'spc' ),
        'id'            => 'spc-sidebar',
        'description'   => __( 'Display widgets on single post.', 'spc' ),
        'before_widget' => '<div class="widget spc">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle spc-title">',
        'after_title'   => '</h2>',
    ));
}

add_filter('the_content', 'spc_display_sidebar');
function spc_display_sidebar( $content ) {
    if(is_single() && get_post_type() == 'pokemon'){
        dynamic_sidebar('spc-sidebar');
    }
    return $content;
}