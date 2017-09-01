<?php
// Enable Composer autoloader
require dirname(__DIR__) . '/vendor/autoload.php';
// Load the required profiles functions
require dirname(__DIR__) . '/inc/functions/profile-global-functions.php';
require dirname(__DIR__) . '/inc/functions/content/profile-landing-page-content.php';
require dirname(__DIR__) . '/inc/functions/content/profile-details-page-content.php';
require dirname(__DIR__) . '/inc/post-type-meta-box/profile-register-post-type.php';
require dirname(__DIR__) . '/inc/post-type-meta-box/profile-landing-page-meta-box.php';
require dirname(__DIR__) . '/inc/post-type-meta-box/profile-details-page-meta-box.php';
