<?php
/**
 * User: mdiaconita
 * ------------------ CONTENTS ---------------------------
 * 1. Main user content area
 * 2. Generate extra textareas
 */
function profile_single_page_content($position, $contact)
{
    global $post;
    if (function_exists('get_post_meta')
        && function_exists('get_the_category')
        && function_exists('the_content')
        && function_exists('the_post_thumbnail')
        && function_exists('the_title')
        && function_exists('post_class')
        && function_exists('has_post_thumbnail')
        && function_exists('the_ID')
    ) {

        ${$position} = get_post_meta($post->ID, $position, true);
        ${$contact} = get_post_meta($post->ID, $contact, true);

        if (isset(${$position}) && !empty(${$position}) || isset(${$contact}) && !empty(${$contact})) { ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-header">
                    <h1><?php the_title(); ?></h1>
                </div>
                <div class="entry-content clearfix">
                    <div class="mobile-dev col-xs-6 col-sm-4 col-md-4 col-lg-4">
                        <?= profile_feature_image('/../../img/profile-fall-back.jpg', has_post_thumbnail()); ?>
                    </div>
                    <div class="mobile-dev col-xs-6 col-sm-8 col-md-8 col-lg-8">
                        <ul class="research-redesign-profile">
                            <?php
                                if (isset(${$position}) && !empty(${$position})) : ?>
                                    <li><strong>Position: </strong><?= ${$position} ?></li>
                                <?php endif;
                                if (!empty(get_the_category())) : ?>
                                    <li><strong>Specialism: </strong> <?= get_cat_profile(get_the_category()) ?></li>
                                <?php endif;
                                if (isset(${$contact}) && !empty(${$contact})) : ?>
                                    <li class="profile-contact"><i class="fa fa-envelope" aria-hidden="true"></i><span><?= ${$contact} ?></span></li>
                                <?php endif; ?>
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

/**
 * Generate extra textareas
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
                    <h1><?= ${$post_meta_head} ?></h1>
                </div>
                <div class="entry-content clearfix">
                    <?= ${$post_meta_body} ?>
                </div>
            </article>
        <?php endif; ?>
    <?php }
}

