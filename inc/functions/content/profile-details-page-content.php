<?php
/**
 * Created by PhpStorm.
 * User: mdiaconita
 * Date: 21/06/2017
 * Time: 11:10
 */

function profile_generate_extra_blurb($post_meta_head, $post_meta_body)
{
    global $post;

    if (function_exists('get_post_meta')) {
        ${$post_meta_head} = get_post_meta($post->ID, $post_meta_head, true);
        ${$post_meta_body} = get_post_meta($post->ID, $post_meta_body, true);

        if (isset(${$post_meta_head}) && !empty(${$post_meta_head}) || isset(${$post_meta_body}) && !empty(${$post_meta_body})) : ?>
            <article class="page type-page status-publish hentry category-beta">
                <div class="entry-header">
                    <h1><?php echo ${$post_meta_head} ?></h1>
                </div>
                <div class="entry-content clearfix">
                    <?php echo ${$post_meta_body} ?>
                </div>
            </article>
        <?php endif; ?>
    <?php }
    return '';
}

function profile_single_page_content($position, $contact)
{
    global $post;
    if (function_exists('get_post_meta')
        && function_exists('get_the_category')
        && function_exists('the_content')
        && function_exists('the_post_thumbnail')
        && function_exists('the_title')
        && function_exists('post_class')
        && function_exists('the_ID')) {

        ${$position} = get_post_meta($post->ID, $position, true);
        ${$contact} = get_post_meta($post->ID, $contact, true);

        if (isset(${$position}) && !empty(${$position}) || isset(${$contact}) && !empty(${$contact})) { ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-header">
                    <h1><?php the_title(); ?></h1>
                </div>
                <div class="entry-content clearfix">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
                        <?php profile_feature_image('/../../img/profile-fall-back.jpg'); ?>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-8">
                        <ul class="research-redesign-profile">
                            <li><strong>Position:</strong> <?php echo ${$position} ?></li>
                            <li>
                                <strong>Specialism:</strong> <?php get_cat_profile(get_the_category(), 'No specialism'); ?>
                            </li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i>
                                <?php echo ${$contact} ?>
                            </li>
                        </ul>
                    </div>
                    <p class="breather clearfix">
                        <?php the_content(); ?>
                    </p>
                </div>
            </article>
            <?php
        }
    }
}
