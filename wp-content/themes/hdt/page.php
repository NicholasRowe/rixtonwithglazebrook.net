<?php

get_header(); ?>

<div class="row">

    <div class="main-content">

        <div class="large-3 columns">

            <aside class="main-sidebar">

            <?php $titlenamer = get_the_title($post->post_parent); ?>

            <?php if (!get_field('hide_left_hand_title')): ?>

            <?php if(get_field('left_hand_title')): ?>
                <h3><?php echo the_field('left_hand_title');?></h3>
            <?php else: ?>
                <h3><?php echo $titlenamer; ?></h3>
            <?php endif; ?>
            <?php endif; ?>
              
			<?php if ($post->post_parent) {

                $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
            
            } else {

                $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");

            }  ?>
    
            <?php if ($children): ?>

                <ul>
                <?php echo $children; ?>
                </ul>

            <?php endif ?>

            <?php if(get_field('left_hand_image')): ?>
                <img src="<?php echo the_field('left_hand_image');?>">
            <?php endif; ?>
				
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

                    <?php if ( has_post_thumbnail() ): ?>

                        <div class="page-featured-image">
                        
                            <article>
                                <?php the_post_thumbnail(); ?>
                            </article>
                                
                        </div>

                    <?php endif; ?>
   
                    <?php the_content(); ?>

                    <?php endwhile; else: ?>

                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

                    <?php endif; ?>

                    <div class="clear"></div>
                    <?php get_template_part( 'location-downloads' ); ?>

                </section>

            </div>

<?php get_footer(); ?>
