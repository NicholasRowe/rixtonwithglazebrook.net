<?php

// Query custom post type

$args = array(
    'post_type' => 'areas-of-focus',
     'meta_key' => 'is_a_featured_area_of_focus', 
     'meta_value' => '1',
    );

$the_query = new WP_Query( $args );

?>

<?php if ( $the_query->have_posts() ) : ?>

  
        <div class="row">

            <div class="large-12 columns">

                <div class="main-slider">

                    <ul data-orbit data-options="animation:fade;
                    pause_on_hover:true;
                    animation_speed:100;
                    navigation_arrows:true;
                    bullets:true;
                    slide_number: false;
                    timer: true;">

                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                        <li>

                            <img src="<?php the_field('featured_area_image'); ?>" alt="" />
                        

                            <div class="orbit-caption">

                                <h2><?php the_field('featured_area_title'); ?></h2>

                            </div>

                        </li>

                    <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>

                </ul>

            </div>

        </div>

    </div>

<?php endif; ?>


