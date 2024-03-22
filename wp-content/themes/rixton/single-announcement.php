<?php 

get_header(); ?>

<div class="row">

    <div class="main-content">

        <div class="large-3 columns">

            <aside class="main-sidebar">
                 <p class="back-sector"><a href="<?php bloginfo('url'); ?>/public-announcements/">« Back to Announcements</a></p>
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

                    <?php the_post_thumbnail(); ?>

                    <?php the_content(); ?>

                    <div class="clear"></div>
                    
                    <?php get_template_part( 'location-downloads' ); ?>

                    <p class="posted-on">Posted on: <?php the_time('jS F Y') ?></p> 

                <?php endwhile; else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>

        </article>

    </div>

<?php get_footer(); ?>