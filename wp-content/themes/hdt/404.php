<?php

get_header(); ?>

<div class="row">

    <div class="main-content">

        <div class="large-3 columns">

            <aside class="main-sidebar">

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

            <section>

                <h2 class="page-title"><?php the_title(); ?></h2>

                    <?php the_content(); ?>

                <?php endwhile; else: ?>

                <h2 class="page-title">Oops!</h2>

                <p><?php _e('Sorry, the requested page was not found.'); ?></p>

            <?php endif; ?>

        </section>

    </div> 
 <?php get_footer(); ?>

