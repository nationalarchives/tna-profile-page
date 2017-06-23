<?php
/**
 * User: mdiaconita
 * Wordpress add_action, add_filter and add_shortcode hooks
 */

if(function_exists('add_action') && function_exists('add_filter') && function_exists('add_shortcode')) {
    // Add actions
    add_action('wp_enqueue_scripts', 'enqueue_profile_page_styles');
    add_action('wp_enqueue_scripts', 'enqueue_profile_page_scripts');
    add_action('init', 'post_type_profile_page_init' );
    add_action('admin_notices', 'check_if_shortcode_exists_in_page_and_add_meta_box' );
    add_action('save_post', 'profile_page_meta_box_save');
    add_action('save_post', 'profile_single_meta_box_save');

    // Add filters
    add_filter('single_template', 'profile_page_single_template');
    // Add short-code
    add_shortcode('profile-page', 'profile_page_shortcode');
}
