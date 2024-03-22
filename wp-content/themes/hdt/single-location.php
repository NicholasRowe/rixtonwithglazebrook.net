<?php

get_header(); ?>

<script type="text/javascript">
  $(document).ready(function() {
    $(".em-locations-list li:nth-child(2n+2)").addClass("position-two");
  });
</script>

<div class="row">

  <div class="main-content">

    <div class="large-12 column">

    </div>

    <div class="large-3 columns">

      <aside class="main-sidebar contact-details">

        <div style="margin-bottom:20px;">
          <?php echo the_post_thumbnail(); ?>
        </div>

        <h3>Contact Us</h3>
        <h4>Address:</h4>
        <p>
          <span style="display:block"><?php echo $EM_Location->output('#_LOCATIONREGION'); ?></span>
          <span style="display:block"><?php echo $EM_Location->output('#_LOCATIONADDRESS'); ?></span>
          <span style="display:block"><?php echo $EM_Location->output('#_LOCATIONTOWN'); ?></span>

          <span style="display:block"><?php echo $EM_Location->output('#_LOCATIONPOSTCODE'); ?></span>
        </p>

        <?php get_template_part('location-contacts'); ?>

      </aside>

    </div>

    <div class="large-9 columns">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <div class="title-strip">

            <?php if (function_exists('yoast_breadcrumb')) {
              yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
            } ?>

          </div>

          <article class="post-content">

            <h2 class="page-title"><?php the_title(); ?></h2>

            <div class="general-location-wrapper-no-padding">
              <?php the_content(); ?>
            </div>


            <?php if (get_field('event_host')) : ?>
              <div class="general-location-wrapper events-listings">
                <h3>What's On</h3>

                <?php
                //Checks if the custom field Group Link has a value assigned
                if (get_field('group_link')) {

                  //Gets the tag name
                  $term = get_field('group_link');
                  $term_name = $term->name;


                  //Adds the tag name to the shortcode
                  $group_link = '[events_list tag=' . '"' . $term_name . '"' . ' limit=5 scope="today-tomorrow" pagination=1]';
                  //Echos the shortcode, therefore showing events 

                  echo do_shortcode($group_link);
                } else {
                  //Get the current location ID

                  echo $location_id;

                  $location_id = $EM_Location->output('#_LOCATIONID');

                  //Adds the tag name to the shortcode
                  $event_list = '[events_list location=' . '"' . $location_id . '"' . ' limit=5 scope="today-tomorrow"  pagination=1]';
                  //Echos the shortcode, therefore showing events 

                  echo do_shortcode($event_list);
                }

                ?>
              </div>
            <?php endif; ?>


            <?php get_template_part('location-news'); ?>

            <?php get_template_part('location-downloads'); ?>

            <?php get_template_part('location-gallery'); ?>


            <div class="general-location-wrapper general-location-wrapper-no-border">
              <h3>How To Find Us</h3>
              <?php echo $EM_Location->output('#_LOCATIONMAP'); ?>
            </div>

          <?php endwhile;
      else : ?>
          <p><?php _e('Sorry, no posts matched yourq criteria.'); ?></p>
        <?php endif; ?>

          </article>

    </div>

    <?php get_footer(); ?>