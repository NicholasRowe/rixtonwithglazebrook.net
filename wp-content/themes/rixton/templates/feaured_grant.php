<?php 

            // Featured Grants

            $featured_grant_args = array(
                'post_type' => 'grants',
                'posts_per_page' => 4,
                'orderby' => 'date',
                'order' => 'ASC',
                'meta_key' => 'grant_area_of_focus', 
                'meta_value' => '1',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'sectors',
                        'field' => 'slug',
                        'terms' => 'community'
                        )
                    )
                );

                $featured_grant = new WP_Query( $featured_grant_args ); ?>


                <?php if ( $featured_grant->have_posts() ) : ?>

                    <!-- <h3>Featured stories from this sector...</h3> -->

                    <ul id="featured-grants" class="small-block-grid-2 medium-block-grid-2 large-block-grid-2">

                        <?php while ( $featured_grant->have_posts() ) : $featured_grant->the_post(); ?>

                            <li>

                                <div class="featured-grant-container">

                                    <?php the_post_thumbnail('sector-img-thumb'); ?>

                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                                    <p><?php the_field('grant_description'); ?></p>

                                    <p><a class='button read-more small' href="<?php the_permalink(); ?>">Read More</a></p> 

                                </div> 

                            </li>

                        <?php endwhile; ?>

                    </ul>

                    <?php wp_reset_postdata(); ?>

                <?php endif; ?>