<?php

function profile_page_shortcode($atts)
{
    $attr = shortcode_atts(array(
        'sidebar' => 'off'
    ), $atts);

    foreach ($attr as $param) {
        if ($param != "on") {
            wp_enqueue_style('profile-page-no-sidebar-styles');

            profile_landing_blurbs('profile_page_receipt_blurb','profile_page_receipt_blurb_two');
            profile_landing_cards('profile', 'user_profile_position');

        }
    }
}

/**
 * Get categories of the post
 * Remove the links
 * Output each category followed by a comma
 * Comma is not added on the last item
 * @param $arr
 * @return false once complete
 */
function get_cat_profile($arr)
{
    $counter = 0;
    if (count($arr) != 0) {
        foreach ($arr as $category) {
            ++$counter;
            echo count($arr) == $counter ? $category->cat_name . '' : $category->cat_name . ', ';
        }
    } else {
        return false;
    }
}

function profile_page_single_template($template)
{
    if (function_exists('get_post_type')) {
        if ('profile' == get_post_type()) {
            // if you're here, you're on a singular page for your custom post
            // type and WP did NOT locate a template, use your own.
            $template = dirname(__FILE__) . '../../../tna-profile-details-page.php';
        }
    }
    return $template;
}

function profile_feature_image($path){
    if(function_exists('has_post_thumbnail') && function_exists('the_post_thumbnail')) {
        if(has_post_thumbnail()) {
            the_post_thumbnail('medium', array('class' => 'img-responsive'));
        } else {
            echo '<img class="img-responsive" src="' . plugins_url( $path, __FILE__ ) .'" />';
        }
    }
}

