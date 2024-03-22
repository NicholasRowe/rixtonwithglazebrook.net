<?php

/**
* Template Name: About
*/

get_header(); ?>


<div class="row">

    <div class="main-content">

        <div class="large-3 columns">

            <aside class="main-sidebar">

                <p class="page-description"><?php the_field('about_us_page_description'); ?></p>

                <?php $titlenamer = get_the_title($post->post_parent); ?>
                
            </aside>

        </div>

        <div class="large-9 columns">

        <?php get_template_part( 'slideshow-page' ); ?>

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <div class="title-strip">

                    <?php if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                    } ?>

                </div>

                <section class="about-us">

                    <h2 class="page-title"><?php the_title(); ?></h2>

                    <div class="row">

                        <div class="large-3 medium-3 small-6 columns">

                            <a href="<?php bloginfo('url'); ?>/about-us/our-story">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/about_our-story.png" alt="">
                            </a>

                        </div>

                        <div class="large-3 medium-3 small-6 columns">

                            <a href="<?php bloginfo('url'); ?>/about-us/our-people/">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/about_our-people.png" alt="">
                            </a>

                        </div>

                        <div class="large-3 medium-3 small-6 columns">

                            <a href="<?php bloginfo('url'); ?>/about-us/our-trustees/">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/about_our-trustees.png" alt="">
                            </a>

                        </div>

                        <div class="large-3 medium-3 small-6 columns">
                            
                            <a href="<?php bloginfo('url'); ?>/about-us/our-vision/">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/about_our-vision.png" alt="">
                            </a>

                        </div>

                    </div>

                <?php endwhile; else: ?>

                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

                <?php endif; ?>

                </section>

    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>