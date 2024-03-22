<?php

get_header(); ?>

<div class="row">

    <div class="main-content">

        <div class="large-3 columns">

            <aside class="main-sidebar">
                <p class="back-sector"><a href="<?php bloginfo('url'); ?>/public-announcements/">« Back to Announcements</a></p>
                
                <h3>Categories</h3>

                <ul>
                    <?php 
                        $args = array(
                        'show_option_all'    => '',
                        'orderby'            => 'name',
                        'order'              => 'ASC',
                        'style'              => 'list',
                        'show_count'         => 0,
                        'hide_empty'         => 1,
                        'use_desc_for_title' => 1,
                        'child_of'           => 0,
                        'feed'               => '',
                        'feed_type'          => '',
                        'feed_image'         => '',
                        'exclude'            => '',
                        'exclude_tree'       => '',
                        'include'            => '',
                        'hierarchical'       => 1,
                        'title_li'           => '',
                        'show_option_none'   => '',
                        'number'             => null,
                        'echo'               => 1,
                        'depth'              => 0,
                        'current_category'   => 0,
                        'pad_counts'         => 0,
                        'taxonomy'           => 'DIB',
                        'walker'             => null
                        );
                        wp_list_categories( $args ); 
                    ?>
                </ul>
            </aside>
        </div>

        <div class="large-9 columns">

            <div class="title-strip">

                <?php if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                } ?>

            </div>

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <article class="post-content">

                        <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

                        <?php the_post_thumbnail('sector-img-large'); ?>

                        <?php the_excerpt(); ?> 

                        <p class="posted-on">Posted on: <?php the_time('jS F Y') ?></p> 

                        <a href="<?php the_permalink() ?>" class="button readmore small">Read more...</a>

                    </article>

                <?php endwhile; else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif; ?>

    <?php wp_pagenavi(); ?>
<?php get_footer(); ?>