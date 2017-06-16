<?php
/**
 * Created by PhpStorm.
 * User: mdiaconita
 * Date: 31/05/2017
 * Time: 16:23
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

function check_if_shortcode_exists_in_page_and_add_meta_box()
{
    global $post;
    if (function_exists('get_current_screen') && function_exists('has_shortcode') && function_exists('add_meta_box'))  {
        $screen = get_current_screen();
        if (isset($screen)) {
            if (is_admin() && ($screen->id == 'page') && has_shortcode($post->post_content, 'profile-page')) {
                add_meta_box('profile-page', 'Profile landing page blurbs', 'profile_landing_page_box', 'page', 'normal', 'high');
            }
            if(is_admin() && ($screen->id == 'profile')){
                add_meta_box('profile-page', 'Profile details', 'profile_single_page_box', 'profile', 'normal', 'high');
            }
        }
    }
}
