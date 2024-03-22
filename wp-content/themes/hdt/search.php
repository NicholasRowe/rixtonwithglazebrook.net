<?php

/*
Template Name: Search Page
*/

get_header(); ?>

<div class="row">

    <div class="main-content">

        <div class="large-3 columns">

            <aside class="main-sidebar">

            </aside>

        </div>

        <div class="large-9 columns">

            <div class="title-strip">

                <?php if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                } ?>

            </div>

            <section>

                <?php if ( have_posts() ) : ?>

                <h2 class="page-title"><?php printf( __( 'Search Results for - %s', '_s' ), '<span>' . get_search_query() . '</span>' ); ?></h2>

                <ul class="search-results">

                <?php while ( have_posts() ) : the_post(); ?>
                
                    <li>
                        <a href="<?php the_permalink(); ?>" rel="bookmark"> <?php the_title(); ?> </a>
                    </li>

                <?php endwhile; ?>

                </ul>

                <?php wp_pagenavi(); ?>

                <?php endif; ?>

            </section>
</div>

<?php get_footer(); ?>