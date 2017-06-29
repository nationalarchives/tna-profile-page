<?php
/**
 * User: mdiaconita
 * ------------------ CONTENTS ---------------------------
 * 1. Landing page content blurbs
 * 2. Generate extra textareas
 */

function profile_landing_blurbs($landing_page_content, $feature_box)
{
    global $post;
    if (function_exists('the_title') && function_exists('get_post_meta')) : ?>
        <div class="row profile-page">
            <div class="col-md-12">
                <article>
                    <div class="entry-header">
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <div class="row entry-content">
                        <div class="col-xs-12 col-sm-8 col-md-8"><p>
                                <?= get_post_meta($post->ID, $landing_page_content, true); ?>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="well">
                                <p>
                                    <?= get_post_meta($post->ID, $feature_box, true); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    <?php endif; ?>
<?php }

/**
 * 2. Landing cards content
 * @param $post_type
 * @param $position
 * @internal param $ : $post_type, $position
 */
function profile_landing_cards($post_type, $position)
{
    global $post;

    $args = array(
        'post_type' => $post_type,
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order'
    );
    $data = new WP_Query($args);
    if (function_exists('the_permalink')
        && function_exists('the_post_thumbnail')
        && function_exists('get_post_meta')
        && function_exists('get_the_category')
        && function_exists('wp_reset_query')
        && function_exists('the_title')
        && function_exists('make_path_relative')
        && function_exists('get_the_permalink')
        && function_exists('has_post_thumbnail')
        && method_exists($data, 'have_posts')
        && method_exists($data, 'the_post')
    ) { ?>
        <div class="flex-row equal-heights">
        <?php if ($data->have_posts()) : while ($data->have_posts()) : $data->the_post(); ?>
            <div class="col-card-3">
                <div class="card">
                    <a href="<?= make_path_relative(get_the_permalink()); ?>">
                        <?= profile_feature_image('/../../img/profile-fall-back.jpg', has_post_thumbnail()); ?>
                        <div class="entry-content">
                            <h2><?php the_title(); ?></h2>
                            <?php ${$position} = get_post_meta($post->ID, $position, true);
                            if (isset(${$position}) && !empty(${$position})) : ?>
                                <p>Position: <?= ${$position} ?></p>
                            <?php endif;
                            if (!empty(get_the_category())) : ?>
                                <p>Specialism: <?= get_cat_profile(get_the_category()) ?></p>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
            </div>
        <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="mobile-dev margin-bottom col-xs-6 col-sm-4 col-md-4 col-lg-3">
                <div class="card">
                    <div class="entry-content">
                        <p>There is no content available at this time.</p>
                    </div>
                </div>
            </div>
        <?php endif;
        wp_reset_query();
    }
}
