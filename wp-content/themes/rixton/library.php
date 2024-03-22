<?php

/**
* Template Name: Library
*/

get_header(); ?>

<div class="row">

    <div class="main-content">

        <div class="large-12 columns">

            <div class="title-strip">

                <?php if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                } ?>

            </div>

            <section>

                <h2 class="page-title"><?php the_title(); ?></h2>

                 <?php if( have_rows('library') ): ?>

                       <div class="library">

                           <h3>Publications</h3>

                           <div class="row-collapse library-title">

                            <div class="large-6 medium-6 columns">Publication Title</div>

                            <div class="large-2  medium-2 columns">Date</div>

                            <div class="large-2 medium-2 columns">&nbsp;</div>

                            <div class="large-2 medium-2 columns">PDF Download</div>

                        </div>

                        <?php while ( have_rows('library') ) : the_row(); ?>


                            <div class="row-collapse library-item">

                                <div class="large-6 medium-6 columns"><?php the_sub_field('title'); ?></div>

                                <div class="large-2 medium-2 columns">

                                <?php $date = DateTime::createFromFormat('Ymd', get_sub_field('date'));
                                echo $date->format('d/m/Y'); ?>
                                </div>

                                <div class="large-2 medium-2 columns">
                                    &nbsp;
                                </div>

                                <div class="large-2 medium-2 columns">
                                   <a href="<?php the_sub_field('pdf_file'); ?>" target="_blank">Download now</a>
                                </div>

                            </div>

                        <?php endwhile; ?>
                    </div>


                    <?php else : ?>
                        <p>The library is empty</p>
                    <?php endif; ?>

            </section>

        </div>


<?php get_footer(); ?>

