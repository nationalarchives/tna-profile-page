<?php

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
                                <?php echo get_post_meta($post->ID, $landing_page_content, true); ?>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="well">
                                <p>
                                    <?php echo get_post_meta($post->ID, $feature_box, true); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    <?php endif; ?>
<?php }

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
    if (   function_exists('the_permalink')
        && function_exists('the_post_thumbnail')
        && function_exists('get_post_meta')
        && function_exists('get_the_category')
        && function_exists('wp_reset_query')
        && function_exists('the_title')
        && function_exists('has_post_thumbnail')
        && method_exists ($data,'have_posts')
        && method_exists ($data,'the_post'))
    { ?>
        <div class="row">
        <div class="cards-wrapper equal-heights-flex-box clearfix">
        <?php if ($data->have_posts()) : while ($data->have_posts()) : $data->the_post(); ?>
            <div class="mobile-dev margin-bottom col-xs-6 col-sm-4 col-md-4 col-lg-3">
                <div class="card">
                    <a href="<?php the_permalink(); ?>"><?php
                            profile_feature_image('/../../img/profile-fall-back.jpg');
                        ?></a>
                    <div class="entry-content">
                        <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                        <?php
                        ${$position} = get_post_meta($post->ID, $position, true);

                        if (isset(${$position}) && !empty(${$position})) : ?>
                            <p>Position: <?php echo ${$position} ?></p>
                        <?php endif; if (!empty(get_the_category())) : ?>
                            <p>Specialism: <?php get_cat_profile(get_the_category()) ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
            </div>
            </div>
        <?php else: ?>
            <div class="mobile-dev margin-bottom col-xs-6 col-sm-4 col-md-4 col-lg-3">
                <div class="card">
                    <div class="entry-content">
                        <p>Sorry, no content</p>
                    </div>
                </div>
            </div>
        <?php endif;
        wp_reset_query();
    }
}
