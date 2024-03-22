<?php

get_header(); ?>

<script type="text/javascript">
    $(document).ready(function() {
    $(".em-locations-list li:nth-child(2n+2)").addClass("position-two");
    });
</script>

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
                ));
                echo '<ul class="locations-list">' . $amenities_list . '</ul>';          
                ?>

            </aside>

        </div>

        <div class="large-9 columns">

            <div class="title-strip">
                <?php if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                } ?>
            </div>

            <section>

              <?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
              <h2 class="page-title"><?php echo $term->name; ?> </h2>

              <?php

                $locations_query = new WP_Query( array(
                  'post_type' => 'location',
                  'posts_per_page' => 100,
                  'order'=>'ASC',
                  'orderby' => 'title',
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'amenity',
                      'field' => 'slug',
                      'terms' => $term->name
                    )
                  )
                ) );
                // Display the custom loop

                if ( $locations_query->have_posts() ): ?>
               
                  <div class="custom-locations-list">
                    <ul class="locations-list-headings">
                      <li>
                      <div class="col-1">Name</div>
                      <div class="col-2">Details</div>
                      <div class="col-3">Contact</div>
                      <div class="clear"></div>
                      </li>
                    </ul>

                  <ul class="em-locations-list">
                    <?php while ( $locations_query->have_posts() ) : $locations_query->the_post(); ?>
                    <li>
                    <div class="col-1"><p><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></p></div>
                    <div class="col-2"><?php the_excerpt(); ?></div>
                    <div class="col-3"><p><?php echo get_post_meta($post->ID,'contact_name',true) ?><br/>
                    <?php echo get_post_meta($post->ID,'contact_number',true) ?></p></div>
                    <div class="clear"></div>
                   </li>
                  
                  <?php endwhile; wp_reset_postdata(); ?>
                  <?php endif; ?>

              </section>
        </div>

    <?php get_footer(); ?>

            

