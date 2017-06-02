<?php
/**
 * Created by PhpStorm.
 * User: mdiaconita
 * Date: 31/05/2017
 * Time: 16:23
 */


if(function_exists('add_action')) {
    add_action('wp_enqueue_scripts', 'enqueue_profile_page_styles');
    add_action('wp_enqueue_scripts', 'enqueue_profile_page_scripts');
    add_action( 'init', 'post_type_profile_page_init' );
}
