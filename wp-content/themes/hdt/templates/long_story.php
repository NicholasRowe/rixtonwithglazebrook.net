<div class="large-3 columns">

            <aside class="main-sidebar">

                <?php echo ' <img src="'.get_stylesheet_directory_uri().'/assets/img/project-' . $termlower . '.png" class="sector-img"> '; ?>

                <p class="back-sector"><a href="<?php bloginfo('url'); ?>/area-focus-overview/<?php echo $termlower ?>/">« Back to <?php echo $term ?></a></p>

                <?php if( get_field('has_testimonial') ) : ?>

                            <div class="grant-testimonial">
                                <p class="testimonial"><?php the_field('grant_testimonial'); ?></p>
                                <p class="author"><span><?php the_field('grant_testimonial_person'); ?></span> <?php the_field('grant_testimonial_organisation'); ?></p>
                            </div>

                        <?php endif; ?>

            </aside>

        </div>

        <div class="large-9 columns">

            <div class="title-strip">

                <?php if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                } ?>

            </div>

            <article class="post-content" >

                <h2 class="page-title"><?php the_title(); ?></h2>

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <div class="row">

                        <div class="large-6 medium-6 columns">

                            <?php the_post_thumbnail(''); ?>

                            <p class="grant-description"><?php the_field('grant_description'); ?></p>

                            <?php the_field('left_columns_text'); ?>

                        </div>

                        <div class="large-6 medium-6 columns">

                            <?php the_content(); ?>

                        </div>
                        
                    </div>

                    

                     

                    

                <?php endwhile; ?>

            <?php endif; ?>

        </article>

    </div>