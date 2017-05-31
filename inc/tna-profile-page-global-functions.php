<?php
/**
 * Created by PhpStorm.
 * User: mdiaconita
 * Date: 31/05/2017
 * Time: 17:18
 */

function enqueue_profile_page_styles()
{
    if (function_exists('wp_register_style') && function_exists('plugin_dir_url')) {
        wp_register_style('tna-profile-page-styles', plugin_dir_url(__FILE__) . 'css/tna-profile-page.css', array(), '1.0.0');
    }
}

function enqueue_profile_page_scripts()
{
    if (function_exists('wp_register_script') && function_exists('plugin_dir_url')) {
        wp_register_script('tna-profile-page-scripts', plugin_dir_url(__FILE__) . 'js/compiled/tna-profile-page-compiled.min.js', array(), '1.0.0', true);
    }
}