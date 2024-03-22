<?php 

get_header(); ?>


<div class="row">

    <div class="main-content">

        <div class="large-3 columns">

            <aside class="main-sidebar">

                <?php
                    global $post;
                    $EM_Event = em_get_event($post->ID, 'post_id');
                ?>
                
                <?php echo the_post_thumbnail(); ?>
                <h3>Contact Us</h3>
                <h4>Address:</h4>
                <p>
                    <?php echo $EM_Event->output('#_LOCATIONREGION'); ?><br/>
                    <?php echo $EM_Event->output('#_LOCATIONADDRESS'); ?><br/>
                    <?php echo $EM_Event->output('#_LOCATIONTOWN'); ?><br/>
                    <?php echo $EM_Event->output('#_LOCATIONPOSTCODE'); ?>
                </p>

                <h4>Contact:</h4>
                <p><span class="contact-name-span"><?php echo $EM_Event->output('#_LATT{contact_name}'); ?></span>
                <?php echo $EM_Event->output('#_LATT{contact_number}'); ?>
                </p>
            </aside>

        </div>

        <div class="large-9 columns">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <div class="title-strip">

                    <?php if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                    } ?>

                </div>

                <article class="post-content" >

                    <h2 class="page-title"><?php the_title(); ?></h2>
                    <div class="general-location-wrapper-no-padding">
                    <?php echo $EM_Event->output('#_EVENTNOTES'); ?>
                    </div>

                    <div class="general-location-wrapper">

                        <p class="single-event-info">
                        <strong>Date/Time:</strong><br/>
                        <?php echo $EM_Event->output('#_EVENTDATES'); ?> | 
                        <?php echo $EM_Event->output('#_EVENTTIMES'); ?></p>

                        <p class="single-event-info">
                        <strong>Location:</strong><br/>
                        <?php echo $EM_Event->output('#_LOCATIONLINK'); ?></p>

                        <p class="single-event-info">
                        <strong>Organised By:</strong><br/>
                         <a href="<?php bloginfo('url'); ?>?p=<?php echo $EM_Event->output('#_ATT{location_link}'); ?>"><?php echo $EM_Event->output('#_ATT{location_link_text}'); ?></a>
                        </p>

                        <div class="clear"></div>

                    </div>

                    <div class="general-location-wrapper">
                    <?php echo $EM_Event->output('#_LOCATIONMAP'); ?>
                    </div>

                    <?php

                    $post_object = get_field('location_link');

                    if( $post_object ): 

                        // override $post
                        $post = $post_object;
                        setup_postdata( $post ); 

                    ?>
    
                    <div>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                        
                        <?php endif; ?>

                        <?php endwhile; else: ?>
                        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                        <?php endif; ?>

                </article>
        </div>
<?php get_footer(); ?>