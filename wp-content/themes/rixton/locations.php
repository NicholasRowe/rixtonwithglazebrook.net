<?php

/**
* Template Name: Locations
*/

get_header(); ?>

<div class="row">

    <div class="main-content">

        <div class="large-3 columns">
    
          <aside class="main-sidebar">

          <h3>Categories</h3>
          <?php
            $amenities_list = wp_list_categories( array(
              'taxonomy' => 'amenity',
              'orderby' => 'name',
              'show_count' => 0,
              'pad_counts' => 0,
              'hierarchical' => 1,
              'echo' => 0,
              'title_li' => ''
            ) );

            // Make sure there are terms with articles
            if ( $amenities_list )
              echo '<ul class="locations-list">' . $amenities_list . '</ul>';
              ?>
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

                <div class="content-block"><?php echo the_field('text');?></div>

                <?php the_content(); ?>

                <?php endwhile; else: ?>

                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

                <?php endif; ?>

              </section>

        </div>
   
<?php get_footer(); ?>
