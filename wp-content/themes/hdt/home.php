<?php
/*
Template Name: Homepage
*/


get_header(); ?>

<?php get_template_part('slideshow'); ?>

<div class="row">

    <div class="home-content">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <section class="home-intro">

                    <div class="large-12 columns">

                        <div class="news large-5 medium-12 columns">

                            <h3><span>Our</span> News</h3>

                            <?php
                            $the_query = new WP_Query(array(
                                'category_name' => 'News',
                                'posts_per_page' => 2,

                            ));
                            ?>

                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                                <article>

                                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                                        <?php the_post_thumbnail(); ?>
                                    </a>

                                    <h4>
                                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                                            <?php echo the_field('home_page_title'); ?>
                                        </a>
                                    </h4>

                                </article>

                            <?php endwhile; ?>

                            <?php wp_reset_postdata(); ?>

                        </div>

                        <div class="resources large-4 medium-6 columns">

                            <h3><span>Your</span> Resources</h3>

                            <ul>
                                <li>
                                    <a href="<?php bloginfo('url'); ?>/local-area/">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/home-local-area.png" alt="">
                                        <p>Local Area</p>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php bloginfo('url'); ?>/local-history/">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/home-history.png" alt="">
                                        <p>Local History</p>
                                    </a>
                                </li>


                                <li>
                                    <a href="<?php bloginfo('url'); ?>/gallery/">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/home-gallery-1.png" alt="">
                                        <p>Gallery</p>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php bloginfo('url'); ?>/get-involved/">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/home-community.png" alt="">
                                        <p>Get Involved</p>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="social large-3 medium-6 columns">

                            <ul class="social-icons">

                                <li>
                                    <a href="#" class="x-logo" style="background: black; padding: 6px;">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/x-logo.png" width="35" height="35" alt="x-logo">
                                    </a>
                                </li>

                            </ul>

                            <?php // require_once('twitter_feed/tweets.php'); 
                            ?>

                            <ul class="home-tweets-ul">
                                <li>
                                    <p class="home-tweet-tweet">Social media coming soon!</p>
                                </li>
                            </ul>

                        </div>

                    </div>

                </section>

            <?php endwhile;
        else : ?>

            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

        <?php endif; ?>

        <?php get_footer(); ?>