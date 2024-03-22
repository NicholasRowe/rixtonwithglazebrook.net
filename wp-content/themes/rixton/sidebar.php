<?php
	// Left Sidebar

	// Requests the url from the server
	$url = $_SERVER["REQUEST_URI"];
	// Checks for the term "event-category" in the url and adds to variable
	$isItEventCat = strpos($url, 'event-category');
	$isItLocationCat = strpos($url, 'amenities');
?>

<aside class="main-sidebar">
			
    <?php $titlenamer = get_the_title($post->post_parent); ?>

    <h3> <?php echo $titlenamer; ?> </h3>

	<?php

	//If we're on the events page show the categories list
   	if ( is_page('events') ) { 
			 echo do_shortcode("[categories_list hide_empty=0]");
	}
	//Or if "event-cateogry" is present in the url show the categories list
	else if ($isItEventCat!==false)
	{
	echo do_shortcode("[categories_list hide_empty=0]");
	}

	else if ( is_page('locations') ) { 
	
   	$amenities_list = wp_list_categories( array(
	  'taxonomy' => 'amenity',
	  'orderby' => 'name',
	  'show_count' => 0,
	  'pad_counts' => 0,
	  'hierarchical' => 1,
	  'echo' => 0,
	  'title_li' => ''
	) );

	// Make sure there are terms with articles
	if ( $amenities_list )
	  echo '<ul class="locations-list">' . $amenities_list . '</ul>';

	} else if ($isItLocationCat!==false) {

	  $amenities_list = wp_list_categories( array(
	  'taxonomy' => 'amenity',
	  'orderby' => 'name',
	  'show_count' => 0,
	  'pad_counts' => 0,
	  'hierarchical' => 1,
	  'echo' => 0,
	  'title_li' => ''
	) );

	// Make sure there are terms with articles
	if ( $amenities_list )
	  echo '<ul class="locations-list">' . $amenities_list . '</ul>';
	}

	//Or list out the child page sub menu if child pages exist
	else { 

	if($post->post_parent)
	  $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
	  else
	  $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
	  if ($children) { ?>
	  
	  <ul>
	  	<?php echo $children; ?>
	  </ul>

	<?php  }}?>

	<?php
		//If we're on the locations page show the categories list
	?>
	
</aside>