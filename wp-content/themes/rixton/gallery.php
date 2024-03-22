<?php

/**
* Template Name: Gallery
*/

get_header(); ?>

<div class="row">

    <div class="main-content">

        <div class="large-12 columns">

            <?php get_template_part( 'slideshow-page' ); ?>

            <div class="title-strip">

                <?php if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                } ?>

            </div>

            <section class="gallery">

                <h2 class="page-title"><?php the_title(); ?></h2>

                <div class="content-block"><?php echo the_field('text');?></div>

                <?php 

                $posts = get_posts(array(
                    'post_type' => 'galleries'

                    )); ?>

                    <?php if ($posts): ?>

                        <ul class="small-block-grid-3">

                            <?php foreach ($posts as $post): ?>

                                <?php setup_postdata( $post ); ?>

                                <li>
                                    <a href="<?php the_permalink(); ?>">
                                        <figure>
                                            <?php the_post_thumbnail(); ?>
                                            <figcaption> <?php the_title(); ?></figcaption>
                                        </figure>
                                    </a>
                                </li>

                            <?php endforeach ?>

                        </ul>

                        <?php wp_pagenavi(); ?>

                        <?php wp_reset_postdata(); ?>

                    </div>

                <?php endif ?>

            </section>

        </div>

        <?php get_footer(); ?>
