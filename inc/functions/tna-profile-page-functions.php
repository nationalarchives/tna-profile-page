<?php
/**
 * Created by PhpStorm.
 * User: mdiaconita
 * Date: 31/05/2017
 * Time: 17:03
 */

/**
 * Register a custom post type called profile.
 * @see get_post_type_labels() for label keys.
 */
function post_type_profile_page_init()
{
    $labels = array(
        'name' => _x('Profiles', 'Post type general name', 'textdomain'),
        'singular_name' => _x('Profile', 'Post type singular name', 'textdomain'),
        'menu_name' => _x('Profiles', 'Admin Menu text', 'textdomain'),
        'name_admin_bar' => _x('Profile', 'Add New on Toolbar', 'textdomain'),
        'add_new' => __('Add New', 'textdomain'),
        'add_new_item' => __('Add New Profile', 'textdomain'),
        'new_item' => __('New Profile', 'textdomain'),
        'edit_item' => __('Edit Profile', 'textdomain'),
        'view_item' => __('View Profile', 'textdomain'),
        'all_items' => __('All Profiles', 'textdomain'),
        'search_items' => __('Search Profiles', 'textdomain'),
        'parent_item_colon' => __('Parent Profiles:', 'textdomain'),
        'not_found' => __('No profiles found.', 'textdomain'),
        'not_found_in_trash' => __('No profiles found in Trash.', 'textdomain'),
        'featured_image' => _x('Profile Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
        'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'archives' => _x('Profile archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
        'insert_into_item' => _x('Insert into profile', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
        'uploaded_to_this_item' => _x('Uploaded to this profile', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
        'filter_items_list' => _x('Filter profiles list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
        'items_list_navigation' => _x('Profiles list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
        'items_list' => _x('Profiles list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'profile'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'taxonomies' => array('category'),
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'menu_icon' => 'dashicons-universal-access'
    );

    register_post_type('profile', $args);
}


add_shortcode('profile-page', 'profile_page_shortcode');

function profile_page_shortcode($atts)
{
    $attr = shortcode_atts(array(
        'sidebar' => 'off'
    ), $atts);


    foreach ($attr as $param) {
        if ($param != "on") {
            wp_enqueue_style('tna-profile-page-no-sidebar-styles');




            global $post;
            // echo add_query_arg('hello', 'world', admin_url( $_SERVER['REQUEST_URI']) );

            $args = array(
                'post_type' => 'profile',
                'posts_per_page' => -1,
                'order' => 'ASC',
                'orderby' => 'menu_order'
            );
            $data = new WP_Query($args); ?>

            <div class="row profile-page">
                <div class="col-md-12">
                    <article>
                        <div class="entry-header">
                            <h1><?php the_title(); ?></h1>
                        </div>
                        <div class="row entry-content">
                            <div class="col-xs-12 col-sm-8 col-md-8"><p>
                                    <?php echo get_post_meta($post->ID, 'profile_page_receipt_blurb', true); ?>
                                </p>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="well">
                                    <p>
                                        <?php echo get_post_meta($post->ID, 'profile_page_receipt_blurb_two', true); ?>
                                    </p>
                                    <!--<p>Some text here</p>-->
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="row">
            <div class="cards-wrapper equal-heights-flex-box clearfix">

            <?php if ($data->have_posts()) : while ($data->have_posts()) : $data->the_post(); ?>
                <div class="margin-bottom col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <div class="card">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail() ?></a>
                        <div class="entry-content">
                            <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                            <p><?php the_excerpt(); ?></p>
                            <p>Specialism: <?php get_cat_profile(get_the_category(), 'No specialism'); ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
                </div>
                </div>
            <?php else: ?>
                <p>Sorry, no content</p>
            <?php endif;
            wp_reset_query(); ?>
            <?php
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
function get_cat_profile($arr, $message = "No categories for this entry post")
{
    $counter = 0;
    if (count($arr) != 0) {
        foreach ($arr as $category) {
            ++$counter;
            echo count($arr) == $counter ? $category->cat_name . '' : $category->cat_name . ', ';
        }
        return true;
    } else {
        echo $message;
        return false;
    }
}





/**
 *
 */


function profile_page_single_template($template)
{
    if ('profile' == get_post_type()) {
        // if you're here, you're on a singlar page for your costum post
        // type and WP did NOT locate a template, use your own.
        $template = dirname(__FILE__) . '../../../single.php';
    }
    return $template;
}





