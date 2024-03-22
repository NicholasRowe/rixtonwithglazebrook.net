<?php

/**
* Template Name: Public Announcements
*/

get_header(); ?>


<div class="row">

    <div class="main-content">

        <div class="large-3 columns">

            <aside class="main-sidebar">
            
                <p class="back-sector"><a href="<?php bloginfo('url'); ?>/news/">« Back to News</a></p>
              
                <?php if (!get_field('hide_left_hand_title')): ?>

                    <?php if(get_field('left_hand_title')): ?>
                        <h3><?php echo the_field('left_hand_title');?></h3>
                    <?php else: ?>
                        <h3>Announcements</h3>
                    
                    <?php endif; ?>
                <?php endif; ?>

             
                <?php if(get_field('left_hand_image')): ?>
                    <img src="<?php echo the_field('left_hand_image');?>">
                <?php endif; ?>

                <?php if ($post->post_parent) {
                    $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
                    } else {
                        $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
                    }  
                ?>
    
                <?php if ($children): ?>
                    <ul>
                        <?php echo $children; ?>
                    </ul>
                <?php endif ?>

            </aside>

        </div>

        <div class="large-9 columns">

            <div class="title-strip">

                <?php if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                } ?>

            </div>
            
            <h1><?php the_title(); ?></h1>
       
            <div class="general-location-wrapper">
            
                <div id="announcementsWrapper">

                    <?php if( have_rows('announcements') ): ?>
                        
                    <div class="row">

                        <div class="large-12 columns">

                            <div class="main-slider">

                                <div id="orbit" class="data-orbit-list" data-orbit data-options="
                                    animation:slide;
                                    animation_speed:1000;
                                    timer_speed: 3500;
                                    navigation_arrows:true;
                                    bullets:false;
                                    slide_number:true;
                                    pause_on_hover:false;
                                    timer: true;
                                    swipe: true;">

                                   
                                    <?php while( have_rows('announcements') ): the_row(); 
                                        // vars
                                        $title = get_sub_field('announcement_title');
                                        $text = get_sub_field('announcement_text');
                                    ?>

                                    <div class="slide">
                                        <div class="slideText"><?php echo $text; ?></div>
                                        <div class="slideTitle"><?php echo $title; ?></div>
                                        <img/>
                                    </div>               

                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endif; ?>

                </div><!--end announcementsWrapper-->

            </div>



            <div class="announcements-wrapper">

                <?php
                   $args = array('post_type' => 'announcement', 'posts_per_page' => '10', 'paged' => get_query_var('paged'));
                   $category_posts = new WP_Query($args);

                   if($category_posts->have_posts()) : 
                      while($category_posts->have_posts()) : 
                         $category_posts->the_post();
                ?>
                
                <div class="archive">
                    <article class="post-content">
                        <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

                        <?php the_post_thumbnail('sector-img-thumb'); ?>

                        <?php the_excerpt(); ?> 

                        <p class="posted-on">Posted on: <?php the_time('jS F Y') ?></p> 

                        <a href="<?php the_permalink() ?>" class="button readmore small">Read more...</a>

                    </article> 
                </div>  

            <?php endwhile; else: ?>

                  Oops, there are no posts.

            <?php endif; ?>
            <?php wp_pagenavi( array( 'query' => $category_posts ) ); ?>  


            <?php wp_reset_query(); ?>

            </div>


            <!-- This code outputs downloads -->
            <?php if( have_rows('attached_files') ): ?>

                <div class="general-location-wrapper">

                    <h3>Resources</h3>
             
                        <ul class="downloads-list">
             
                            <?php while( have_rows('attached_files') ): the_row(); 
                                // vars
                                $link = get_sub_field('file');
                                $title = get_sub_field('file_name');
                            ?>
                                <li>
                                    <?php echo $title; ?> - 
                                    <?php if( $link ): ?>
                                        <a href="<?php echo $link; ?>">
                                    <?php endif; ?>
                     
                                    Download
                     
                                    <?php if( $link ): ?>
                                        </a>
                                    <?php endif; ?>
                                </li>
                         
                            <?php endwhile; ?>
                         
                        </ul>
                </div>

            <?php endif; ?>
    </div>
</div>
  
<?php get_footer(); ?>