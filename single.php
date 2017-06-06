<?php
/**
 * Created by PhpStorm.
 * User: mdiaconita
 * Date: 06/06/2017
 * Time: 16:25
 */

get_header(); ?>
<?php get_template_part('breadcrumb'); ?>

    <div id="primary" class="content-area">
        <div class="container">
            <div class="row">
                <main id="main" class="col-xs-12 col-sm-8 col-md-8 research-redesign" role="main">
                    <?php
                    while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-header">
                                <h1><?php the_title(); ?></h1>
                            </div>
                            <div class="entry-content clearfix">
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
                                    <?php the_post_thumbnail() ?>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-8">
                                    <ul class="research-redesign-profile">
                                        <li><strong>Position:</strong> Principal Records Specialist</li>
                                        <li><strong>Specialism:</strong> <?php get_cat_profile(get_the_category(), 'No specialism'); ?></li>
                                        <li><i class="fa fa-envelope" aria-hidden="true"></i>
                                            Richard.Dunley@nationalarchives.gsi.gov.uk
                                        </li>
                                    </ul>
                                </div>
                                <p class="breather clearfix">
                                    <?php the_content(); ?>
                                </p>
                            </div>
                        </article>
                        <article class="page type-page status-publish hentry category-beta">
                            <div class="entry-header">
                                <h1>Select Publications</h1>
                            </div>
                            <div class="entry-content clearfix">
                                <ul>
                                    <li>S.H. Hong, K. Ntanos, et al., ‘Climate change mitigation strategies for mechanically
                                        controlled repositories: The case of The National Archives, Kew’, Atmospheric
                                        Environment, 49 (2012), pp. 163-170.
                                    </li>
                                    <li>K. Ntanos and S. VanSnick,  ‘Understanding the environment in an archive store’,
                                        International Preservation News, 55 (2011), pp. 15-20.
                                    </li>
                                    <li>A. Fenech, K. Ntanos, et al., ‘Volatile Aldehydes in Libraries and Archives’,
                                        Atmospheric Environment, 44 (2010) pp. 2067-2073.

                                    </li>
                                </ul>
                                More publications by <a href="#">Richard Dunley</a>
                            </div>

                        </article>

                        <article class="page type-page status-publish hentry category-beta">
                            <div class="entry-header">
                                <h1>Current Research Students</h1>
                            </div>
                            <div class="entry-content clearfix">
                                <ul>
                                    <li>Puja Prentice, University College London, ‘Uncertainty of Damage Functions in Preventive
                                        Conservation of Collections’
                                    </li>
                                </ul>
                            </div>

                        </article>
                        <article class="page type-page status-publish hentry category-beta">
                            <div class="entry-header">
                                <h1>Completed Research Students</h1>
                            </div>
                            <div class="entry-content clearfix">
                                <ul>
                                    <li>Dr Ann Fenech, University College London, ‘Lifetime of colour photographs in mixed
                                        archival collections’ (2011)
                                    </li>
                                </ul>
                            </div>

                        </article>

                        <article class="page type-page status-publish hentry category-beta">
                            <div class="entry-header">
                                <h1>Research Projects</h1>
                            </div>
                            <div class="entry-content clearfix">
                                <ul>
                                    <li>‘Collections Demography’ On Dynamic Evolution of Populations of Objects</li>
                                </ul>
                            </div>
                        </article>
                    <?php endwhile;
                    ?>
                </main>
                <?php
                global $post;
                $sidebar = get_post_meta($post->ID, 'sidebar', true);
                if ($sidebar == 'false') {
                    // do nothing
                } else {
                    get_sidebar($sidebar);
                }
                ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>