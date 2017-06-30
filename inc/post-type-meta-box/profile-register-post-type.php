<?php
/**
 * Register a custom post type called profile.
 * @see get_post_type_labels() for label keys.
 * Rewrite slug at the line 36
 */
function post_type_profile_page_init()
{
    $labels = array(
        'name' => _x('Profiles', 'Post type general name', 'textdomain'),
        'singular_name' => _x('Staff Profiles', 'Post type singular name', 'textdomain'),
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

    $page_name_shortcode = "about/our-role/our-research-and-collaboration/staff-profiles";

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => $page_name_shortcode),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'taxonomies' => array('category'),
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'menu_icon' => 'dashicons-universal-access'
    );

    register_post_type('profile', $args);
}