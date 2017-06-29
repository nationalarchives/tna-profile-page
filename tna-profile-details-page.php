<?php
/**
 * User: mdiaconita
 */

global $post;

if (function_exists('get_header')
    && function_exists('get_template_part')
    && function_exists('have_posts')
    && function_exists('the_post')
    && function_exists('get_post_meta')
    && function_exists('get_footer')
    && function_exists('make_path_relative')
) {
    get_header(); ?>
    <?php make_path_relative(get_template_part('breadcrumb')); ?>
    <div id="primary" class="content-area">
        <div class="container">
            <div class="row">
                <main id="main" class="col-xs-12 col-sm-8 col-md-8 research-redesign" role="main">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php profile_single_page_content('user_profile_position', 'user_profile_contact') ?>
                        <?php profile_generate_extra_blurb('user_profile_extra_headline', 'user_profile_extra'); ?>
                        <?php profile_generate_extra_blurb('user_profile_extra_two_headline', 'user_profile_extra_two'); ?>
                        <?php profile_generate_extra_blurb('user_profile_extra_three_headline', 'user_profile_extra_three'); ?>
                        <?php profile_generate_extra_blurb('user_profile_extra_four_headline', 'user_profile_extra_four'); ?>
                    <?php endwhile; ?>
                </main>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>

    <?php get_footer();
} ?>