<?php 

get_header(); ?>

<div class="row">

    <div class="main-content">

        <div class="large-3 columns">

            <aside class="main-sidebar">
                 <p class="back-sector"><a href="<?php bloginfo('url'); ?>/news/">« Back to News</a></p>
               <h3>Recent News</h3>

                <ul>
                <?php $args = array(
                    'type'            => 'monthly',
                    'limit'           => '2',
                    'format'          => 'html', 
                    'before'          => '',
                    'after'           => '',
                    'show_post_count' => false,
                    'echo'            => 1,
                    'order'           => 'DESC'
                  ); 
                ?>
                <ul>
                <?php wp_get_archives( $args ); ?>
                </ul>
                </ul>
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

                    <?php the_post_thumbnail('news-thumb-350-350'); ?>

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