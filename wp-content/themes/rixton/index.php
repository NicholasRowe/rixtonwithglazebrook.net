<?php

get_header(); ?>

<article class="post-content">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <h2 class="post-title"><?php the_title(); ?></h2>

        <?php the_content(); ?>

    	<?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    
    <?php endif; ?>

</article>


<?php get_sidebar(); ?>
<?php get_footer(); ?>