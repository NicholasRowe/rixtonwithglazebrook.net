<?php

/**
* Template Name: News
* Description: Listing Template
*/

get_header(); ?>

<div class="row">

    <div class="main-content">

        <div class="large-3 columns">

            <aside class="main-sidebar">


            <?php if (!get_field('hide_left_hand_title')): ?>

            <?php if(get_field('left_hand_title')): ?>
                <h3><?php echo the_field('left_hand_title');?></h3>
            <?php else: ?>
                <h3>News</h3>
            <?php endif; ?>
             <?php endif; ?>


            <?php if(get_field('left_hand_image')): ?>
                <img src="<?php echo the_field('left_hand_image');?>">
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



           <?php $args = array(
            'type'            => 'monthly',
            'limit'           => '2',
            'format'          => 'html',
            'before'          => '',
            'after'           => '',
            'show_post_count' => false,
            'echo'            => 1,
            'order'           => 'DESC',
            'paged'               => $paged
          ); ?>

            </aside>

        </div>

        <div class="large-9 columns">

            <div class="title-strip">

                <?php if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                } ?>

            </div>



            <?php


   $category_posts = new WP_Query($args);

   if($category_posts->have_posts()) :
      while($category_posts->have_posts()) :
         $category_posts->the_post();
?>
<div class="archive">
        <article class="post-content">

                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

                    <?php the_post_thumbnail('sector-img-large'); ?>

                    <?php the_excerpt(); ?>

                    <p class="posted-on">Posted on: <?php the_time('jS F Y') ?></p>

                    <a href="<?php the_permalink() ?>" class="button readmore small">Read more...</a>

                    </article>
    </div>
<?php
      endwhile;
   else:
?>

      Oops, there are no posts.

<?php
   endif;
?>
<?php wp_pagenavi( array( 'query' => $category_posts ) ); ?>




        <?php get_footer(); ?>
