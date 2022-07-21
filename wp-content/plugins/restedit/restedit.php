<?php
/*
Plugin Name:  REST Edit
Description:  Example plugin for the video tutorial series, "WordPress: Plugin Development", available at Lynda.com.
Plugin URI:   https://profiles.wordpress.org/specialk
Author:       Huras Alexandre
Version:      1.0
Text Domain:  rest-edit
Domain Path:  /re
License:      GPL v2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
*/


if (!defined('WPINC')) {
    exit;
}

add_action('wp_enqueue_scripts', 'RE_addScripts');
function RE_addScripts(){
    if (!is_admin() && is_single()){
        if(is_user_logged_in() && current_user_can('edit_others_posts')){
            wp_enqueue_script('restedit_script', plugin_dir_url(__FILE__) . 'js/restedit.ajax.js', array('jquery'), '0.1', true ); //Add script
            wp_localize_script('restedit_script', 'WPsettings', array( //Passa a variável WPsettings com os valores no array para o script "restedit_script"
                'root' => esc_url_raw(rest_url()),
                'nonce' => wp_create_nonce('wp_rest'),
                'current_ID' => get_the_ID()
            ));
        }
    }
}