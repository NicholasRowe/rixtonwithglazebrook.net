<?php 

/**
* Template Name: Events
*/

get_header(); ?>

<div class="row">

    <div class="main-content">

        <div class="large-3 columns">

            <aside class="main-sidebar">
              
               <h3>Categories</h3>

               <?php

                //If we're on the events page show the categories list
               if ( is_page('events') ) { 
                         echo do_shortcode("[categories_list hide_empty=0]");
                }
                //Or if "event-cateogry" is present in the url show the categories list
                else if ($isItEventCat!==false)
                {
                echo do_shortcode("[categories_list hide_empty=0]");
                }

                ?>

            </aside>
        </div>

        <div class="large-9 columns">

            <div class="title-strip">

                <?php if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                } ?>

            </div>

            <article class="post-content">

                <div>
                    <h2 class="page-title left"><?php the_title(); ?></h2>
                    
                    <div class="right"><a href="<?php bloginfo('url'); ?>/events/" class="left button readmore small">All events</a> <a href="<?php bloginfo('url'); ?>/events/?scope=week&action=search_events" class="this-week left button readmore small">This week</a></div>
                    <div class="clear"></div>
                    <div class="content-block"><?php echo the_field('text');?></div>
                </div>

                <?php the_content(); ?>

            </article>
        </div>

<?php get_footer(); ?>