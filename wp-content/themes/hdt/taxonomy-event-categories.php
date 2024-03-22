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
              'taxonomy' => 'event-categories',
              'hide_empty'    => 0,
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

                $events_query = new WP_Query( array(
                  'post_type' => 'event',
                  'posts_per_page' => 5,
                  'order'=>'ASC',
                  'orderby' => 'title',
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'event-categories',
                      'field' => 'slug',
                      'terms' => $term->name
                    )
                  )
                ));
                // Display the custom loop

                if ( $events_query->have_posts() ): ?>
               
                  <div class="custom-locations-list custom-events-list">
                  <ul class="locations-list-headings">
                    <li>
                      <div class="col-1">Date/Time</div>
                      <div class="col-2">Event</div>
                      <div class="col-3">Organiser</div>
                      <div class="col-4">Location</div>
                      <div class="clear"></div>
                    </li>
                  </ul>

                  <ul class="em-locations-list">

                   <?php 

                   $url = get_bloginfo('url');

                   echo EM_Events::output( array('limit'=>7, 'category' => $term->name, 'scope' => '1-months', 'pagination' =>1, 'format'=>'
                   <li>
                    <div class="col-1"><p>#_EVENTDATES<br/>#_EVENTTIMES</p></div>
                    <div class="col-2"> #_EVENTLINK<br/>#_EVENTEXCERPT</div>
                    <div class="col-3"><p><a href="$url/?p=#_ATT{location_link}">#_ATT{location_link_text}</a></p></div>
                    <div class="col-4"><p>{has_location}#_LOCATIONLINK{/has_location}</p></div>
                    <div class="clear"></div>
                    </li>
                 
                  ') ); ?>

                  <?php else: ?>

                  <p><?php _e('Sorry, there are no events in this category.'); ?></p>
               
                  <?php endif; ?>

                   </ul>

                </section>
        </div>
 <?php get_footer(); ?>

            

