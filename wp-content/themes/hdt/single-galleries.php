<?php 

get_header(); ?>

<div class="row">

    <div class="main-content">

        <div class="large-3 columns">

            <aside class="main-sidebar">

                <p class="back-sector"><a href="<?php bloginfo('url'); ?>/gallery/">« Back to Galleries</a></p>

                <h3>Album Overview:</h3>

               <p><?php the_field('gallery_description'); ?></p>

               <?php the_content(); ?>

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

                    <div id="gallery-page-wrapper">
                    
                        <?php 
                            $images = get_field('gallery');
                            if( $images ): 
                        ?>
                        
                        <div class="">
                       
                        <?php 
                        $image_ids = get_field('gallery', false, false);

                        $shortcode = '[gallery columns="4" ' . implode(',', $image_ids) . '"]';

                        $gallery = do_shortcode( $shortcode );

                        echo slb_activate($gallery);

                        ?>

                        <div style="clear:both;"></div>
                        </div>

                        <?php endif; ?>

                    </div>

                    <p class="posted-on">Posted on: <?php the_time('jS F Y') ?></p> 

                    <?php endwhile; else: ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                    <?php endif; ?>
                    
                </article>
    </div>

<?php get_footer(); ?>