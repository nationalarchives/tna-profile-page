<?php
/**
 * Plugin Name: The National Archives Profile Page
 * Plugin URI: nationalarchives.gov.uk
 * Description: Create profile pages
 * Version: 1.0.0
 * Author: Mihai Diaconita
 * License: GPL2
 */

/***
 * ------------------ CONTENTS ---------------------------
 * Wordpress add_action, add_filter and add_shortcode hooks
 */
include 'functions.php';

/**
 * 1. Enqueue stylesheet
 * 2. Enqueue scripts
 * 3. Check if shortcode exists in page and add meta box
 * 4. Create the shortcode and its content
 * 5. Get categories of the post
 * 6. Get the profile details page template
 * 7. Display feature image
 * 8. Guard functions exist
 */
include 'inc/functions/profile-global-functions.php';

/**
 * 1. Landing page content blurbs
 * 2. Generate extra textareas
 */
include 'inc/functions/content/profile-landing-page-content.php';

/**
 * 1. Main user content area
 * 2. Generate extra textareas
 */
include 'inc/functions/content/profile-details-page-content.php';

/**
 * 1. Register a custom post type called profile.
 */
include 'inc/post-type-meta-box/profile-register-post-type.php';

/**
 * 1. Custom meta box for profile landing page
 * 2. Save custom meta box
 */
include 'inc/post-type-meta-box/profile-landing-page-meta-box.php';

/**
 * 1. Custom meta box for profile landing page
 * 2. Save custom meta box
 */
include 'inc/post-type-meta-box/profile-details-page-meta-box.php';

/**
 * 1. Breadcrumbs
 */
include 'inc/functions/dimox_breadcrumb.php';


