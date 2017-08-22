<?php
/**
 * User: mdiaconita
 * Enqueue stylesheet
 */
function enqueue_profile_page_styles()
{
    if (function_exists('wp_register_style') && function_exists('plugin_dir_url') && function_exists('wp_enqueue_style')) {
        wp_register_style('profile-page-no-sidebar-styles', plugin_dir_url(__FILE__) . '../../css/profile-page-no-sidebar.css');
        wp_register_style('profile-page-styles', plugin_dir_url(__FILE__) . '../../css/profile-page.css');
        wp_register_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
        wp_enqueue_style('profile-page-styles');
        wp_enqueue_style('font-awesome');
        wp_enqueue_style( 'tna-child-ie9-styles' );
        global $wp_styles;
        $wp_styles->add_data( 'tna-child-ie9-styles', 'conditional', 'lte IE 9' );
    }
}

/**
 * Enqueue scripts
 */
function enqueue_profile_page_scripts()
{
    if (function_exists('wp_script_add_data')
        && function_exists('wp_register_script')
        && function_exists('plugin_dir_url')
        && function_exists('wp_enqueue_script'))
    {
        wp_register_script('profile-page-scripts', plugin_dir_url(__FILE__) . '../../js/compiled/profile-page-compiled.min.js', array(), '1.0.0', true);
        wp_enqueue_script('profile-page-scripts');
    }
}

/**
 * Check if shortcode exists in page and add meta box
 */
function check_if_shortcode_exists_in_page_and_add_meta_box()
{
    global $post;
    if (function_exists('get_current_screen')
        && function_exists('has_shortcode')
        && function_exists('is_admin')
        && function_exists('add_meta_box')
    ) {
        $screen = get_current_screen();
        if (isset($screen)) {
            if (is_admin() && ($screen->id == 'page') && has_shortcode($post->post_content, 'profile-page')) {
                add_meta_box('profile-page', 'Profile landing page blurbs', 'profile_landing_page_box', 'page', 'normal', 'high');
            }
            if (is_admin() && ($screen->id == 'profile')) {
                add_meta_box('profile-page', 'Profile details', 'profile_single_page_meta_box', 'profile', 'normal', 'high');
            }
        }
    }
}

/**
 * Create the shortcode and its content
 * @param $atts
 */
function profile_page_shortcode($atts)
{
    if (function_exists('shortcode_atts')
        && function_exists('wp_enqueue_style')
    ) {
        $attr = shortcode_atts(array(
            'sidebar' => 'off'
        ), $atts);

        foreach ($attr as $param) {
            if ($param != "on") {
                // Enqueue style if sidebar is OFF and apply stylesheet like e.g. hide sidebar, change container width etc.
                wp_enqueue_style('profile-page-no-sidebar-styles');

                // Layout and content on profile landing page
                profile_landing_blurbs('profile_page_receipt_blurb', 'profile_page_receipt_blurb_two');
                profile_landing_cards('profile', 'user_profile_position');

            } else {
                // Layout and content on profile landing page
                profile_landing_blurbs('profile_page_receipt_blurb', 'profile_page_receipt_blurb_two');
                profile_landing_cards('profile', 'user_profile_position');
            }
        }
    }
}

/**
 * Get categories of the post
 * Remove the links
 * Output each category followed by a comma
 * Comma is not added on the last item
 * @param $arr
 * @return string
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
        return '';
    }
}

/**
 * Get the profile details page template
 * @param $template
 * @return string
 */
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

/**
 * Display feature image
 * Added fallback
 * @param $path
 * @return string
 */
function profile_feature_image($path, $thumbnail_exists)
{
    if (function_exists('has_post_thumbnail')
        && function_exists('plugins_url')
        && function_exists('make_path_relative')
        && function_exists('the_post_thumbnail')
    ) {
        if ($thumbnail_exists) {
            return make_path_relative(the_post_thumbnail('medium', array('class' => 'img-responsive')));
        } else {
            return '<img class="img-responsive" src="' . plugins_url($path, __FILE__) . '" />';
        }
    }
}

/**
 * Guard functions exist
 * @param $arr
 * @return bool
 */
function guard_functions_exist($arr)
{
    $flag = true;
    foreach ($arr as $func) {
        if (function_exists($func) !== true) {
            $flag = false;
        };
    }
    return $flag;
}

function profile_breadcrumbs()
{
    if (function_exists('get_permalink')
        && function_exists('network_site_url')
        && function_exists('is_home')
        && function_exists('is_front_page')
        && function_exists('url_to_postid')
        && function_exists('get_the_title')

    ) {

        $permalink = get_permalink();
        if ($permalink !== network_site_url()) {
            $link = str_replace(network_site_url(), '', $permalink);
        } else {
            $link = null;
        }
        $link = rtrim($link, '/');
        $link = ltrim($link, '/');
        $link_parts = explode('/', $link);
        $last = end($link_parts);
        $url = '';
        echo '<div class="breadcrumbs">';
        if (is_home() || is_front_page()) {
            echo '<span><a href="' . network_site_url() . '/' . '">Home</a></span>';
        } else {
            echo '<span><a href="' . network_site_url() . '/' . '">Home</a></span>';
            echo ' <span class="sep">&gt;</span> ';
            foreach ($link_parts as $part) {
                $url .= $part . '/';
                $full_url = network_site_url() . '/' . $url;
                $id = url_to_postid($full_url);
                $title = get_the_title($id);
                if ($part !== $last) {
                    echo '<span><a href="' . $full_url . '">' . $title . '</a></span>';
                    echo ' <span class="sep">&gt;</span> ';
                } else {
                    echo '<span>' . $title . '</span>';
                }
            }
        }
        echo '</div>';
    }
}

/**
 * @param $classes
 * @return array
 */
function profile_body_class($classes)
{

    $classes[] = 'profile-page-plugin';

    return $classes;

}

/**
 * @param $sources
 * @return bool
 */
function profile_disable_srcset($sources ) {
    return false;
}