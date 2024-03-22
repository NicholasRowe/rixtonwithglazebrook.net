<?php if( get_field('location_news') ): ?>
	<div class="general-location-wrapper location-news-wrapper">
   
	<?php
	$cat = get_field('location_news');
	$my_query = new WP_Query( 
		array(  'posts_per_page' => 5, 'cat' => $cat, 'paged' => get_query_var('paged') ) ); 
	?>

	<h3>Our News</h3>

	<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>

	<div class="archive">
		<article class="post-content">
			<?php the_post_thumbnail('sector-img-thumb'); ?>

			<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>

			<p>
			<?php echo get_the_popular_excerpt(); ?> ... <a href="<?php the_permalink() ?>">more</a> 
			</p>
		</article> 
	</div>


	<?php endwhile; ?>

	<div class="pagination">
		<?php wp_pagenavi( array( 'query' => $my_query ) ); ?>
		<div class="clear"></div>
	</div>

<?php wp_reset_postdata();  // avoid errors further down the page ?>
</div>
<?php endif; ?>