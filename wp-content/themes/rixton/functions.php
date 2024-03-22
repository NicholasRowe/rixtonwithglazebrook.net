<?php 


// Register Theme Styles
function theme_styles()  {  
    wp_register_style( 'main', get_template_directory_uri() . '/assets/css/app.css', array(), '', 'all' );  
    wp_enqueue_style( 'main' );  

    // wp_register_style( 'font-awesome', get_template_directory_uri() . ' /assets/css/font-awesome.min.css', array(), '', 'all' );  
    // wp_enqueue_style( 'font-awesome' );  

   
}  
add_action( 'wp_enqueue_scripts', 'theme_styles' );



add_action('do_meta_boxes', 'replace_featured_image_box');  
function replace_featured_image_box()  
{  
    remove_meta_box( 'postimagediv', 'post', 'side' );  
    add_meta_box('postimagediv', __('Thumbnail'), 'post_thumbnail_meta_box', 'post', 'side', 'low');
    remove_meta_box( 'postimagediv', 'grants', 'side' );  
    add_meta_box('postimagediv', __('Thumbnail'), 'post_thumbnail_meta_box', 'grants', 'side', 'low'); 
}



// Register Theme Scripts
function theme_scripts() {

// Register main-ck-js with jQuery as a dependancy, no version number required and placed in the footer true.
  wp_register_script( 
    'main', 
    get_template_directory_uri() . '/assets/js/app-ck.js',
    array( 'jquery' ),
    '',
    true
    );

  wp_enqueue_script( 'main' );  

   wp_register_script( 
    'colorbox', 
    get_template_directory_uri() . '/assets/js/colorbox.js',
    array( 'jquery' ),
    '',
    true
    );

   wp_enqueue_script( 'colorbox' );

   wp_register_script( 
    'easing', 
    get_template_directory_uri() . '/assets/js/jquery.easing.min.js',
    array( 'jquery' ),
    '',
    true
    );

   wp_enqueue_script( 'easing' );

      wp_register_script( 
    'scrollup', 
    get_template_directory_uri() . '/assets/js/scrollup.js',
    array( 'jquery' ),
    '',
    true
    );

   wp_enqueue_script( 'scrollup' );
 
}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );

add_theme_support( 'post-thumbnails' ); 


// Multiple Excerpts
function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt; 
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }

    // echo excerpt(25); 




// Thumbnail sizes
add_image_size( 'sector-img-large', 300, 150, true );
add_image_size( 'sector-img-thumb', 150, 100, true );
add_image_size( 'grant_sub_thumb', 75, 75, true );
add_image_size( 'news-thumb-350-350', 350, 350 ); // 220 pixels wide by 180 pixels tall, soft proportional crop mode


/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'joints-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'joints-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. 
*/

// add taxoonomy term to body_class
function wpprogrammer_custom_taxonomy_in_body_class( $classes ){
  if( is_singular() )
  {
    $custom_terms = get_the_terms(0, 'sector');
    if ($custom_terms) {
      foreach ($custom_terms as $custom_term) {
        $classes[] = 'sector-' . $custom_term->slug;
      }
    }
  }
  return $classes;
}

add_filter( 'body_class', 'wpprogrammer_custom_taxonomy_in_body_class' );



// Create a single template for a custom post type with a taxonomy for it's terms
function get_custom_single_template($single_template) {
    global $post;

    if ($post->post_type == 'grants') {
        $terms = get_the_terms($post->ID, 'sectors');
        if($terms && !is_wp_error( $terms )) {
            //Make a foreach because $terms is an array but it supposed to be only one term
            foreach($terms as $term){
                $single_template = dirname( __FILE__ ) . '/single-'.$term->slug.'.php';
            }
        }
     }
     return $single_template;
}

add_filter( "single_template", "get_custom_single_template" ) ;


/**
 * Add custom taxonomies
 */
function add_custom_taxonomies() {

  register_taxonomy('amenity', 'location', array(
   
    'hierarchical' => true,
    
    'labels' => array(
      'name' => _x( 'Amenities', 'taxonomy general name' ),
      'singular_name' => _x( 'Amenity', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Amenities' ),
      'all_items' => __( 'All Amenities' ),
      'parent_item' => __( 'Parent Amenity' ),
      'parent_item_colon' => __( 'Parent Amenity:' ),
      'edit_item' => __( 'Edit Amenity' ),
      'update_item' => __( 'Update Amenity' ),
      'add_new_item' => __( 'Add New Amenity' ),
      'new_item_name' => __( 'New Amenity Name' ),
      'menu_name' => __( 'Amenities' ),
      'orderby' => __( 'ASC' ),
    ),
   
    'rewrite' => array(
      'slug' => 'amenities', 
      'with_front' => false, 
      'hierarchical' => true 
    ),
  ));

  register_taxonomy('DIB', 'announcement', array(
   
    'hierarchical' => true,
    
    'labels' => array(
      'name' => _x( 'Announcement', 'taxonomy general name' ),
      'singular_name' => _x( 'Announcement', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Announcements' ),
      'all_items' => __( 'All Announcements' ),
      'parent_item' => __( 'Parent Announcements' ),
      'parent_item_colon' => __( 'Parent Announcements:' ),
      'edit_item' => __( 'Edit Announcements' ),
      'update_item' => __( 'Update Announcements' ),
      'add_new_item' => __( 'Add New Announcements' ),
      'new_item_name' => __( 'New Announcement Name' ),
      'menu_name' => __( 'Announcements' ),
     
    ),
    'rewrite' => array(
      'slug' => 'dib', 
      'with_front' => false
    ),
   
  ));

  
}
add_action( 'init', 'add_custom_taxonomies', 0 );

function my_em_own_taxonomy_register(){

    register_taxonomy_for_object_type('custom_category',EM_POST_TYPE_EVENT);

    register_taxonomy_for_object_type('custom_category',EM_POST_TYPE_LOCATION);

}

add_action('init','my_em_own_taxonomy_register',100);





add_action( 'restrict_manage_posts', 'my_restrict_manage_posts' );
function my_restrict_manage_posts() {

    // only display these taxonomy filters on desired custom post_type listings
    global $typenow;
    if ($typenow == 'location') {

        // create an array of taxonomy slugs you want to filter by - if you want to retrieve all taxonomies, could use get_taxonomies() to build the list
        $filters = array('amenity');

        foreach ($filters as $tax_slug) {
            // retrieve the taxonomy object
            $tax_obj = get_taxonomy($tax_slug);
            $tax_name = $tax_obj->labels->name;
            // retrieve array of term objects per taxonomy
            $terms = get_terms($tax_slug);

            // output html for taxonomy dropdown filter
            echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
            echo "<option value=''>Show All $tax_name</option>";
            foreach ($terms as $term) {
                // output each select option line, check against the last $_GET to show the current option selected
                echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>';
            }
            echo "</select>";
        }
    }
}

add_filter( 'em_events_build_sql_conditions', 'my_em_scope_conditions',1,2);



//Custom outputs for event shortcodes
function my_em_scope_conditions($conditions, $args){

  if( !empty($args['scope']) && $args['scope']=='today-tomorrow' ){
    $start_date = date('Y-m-d',current_time('timestamp'));
    $end_date = date('Y-m-d',strtotime("+90 day", current_time('timestamp')));
    $conditions['scope'] = " (event_start_date BETWEEN CAST('$start_date' AS DATE) AND CAST('$end_date' AS DATE)) OR (event_end_date BETWEEN CAST('$end_date' AS DATE) AND CAST('$start_date' AS DATE))";
  }

  if( !empty($args['scope']) && $args['scope']=='week' ){
    $start_date = date('Y-m-d',current_time('timestamp'));
    $end_date = date('Y-m-d',strtotime("+7 day", current_time('timestamp')));
    $conditions['scope'] = " (event_start_date BETWEEN CAST('$start_date' AS DATE) AND CAST('$end_date' AS DATE)) OR (event_end_date BETWEEN CAST('$end_date' AS DATE) AND CAST('$start_date' AS DATE))";
  }

  return $conditions;
}

$conditions['scope'] = " (event_start_date BETWEEN CAST('$start_date' AS DATE) AND CAST('$end_date' AS DATE)) OR (event_end_date BETWEEN CAST('$end_date' AS DATE) AND CAST('$start_date' AS DATE))";

add_filter( 'em_get_scopes','my_em_scopes',1,1);
function my_em_scopes($scopes){
  $my_scopes = array(
    'today-tomorrow' => 'Today and Tomorrow',
    'week' => 'This Week'
  );
  return $scopes + $my_scopes;
}



//Menu support
// function register_my_menu() {
//   register_nav_menu('Header Menu');
// };


// add_action( 'init', 'register_my_menu' );


//Used to shorten news excerpt on locations
function get_the_popular_excerpt(){
$excerpt = get_the_content();
$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
$excerpt = strip_shortcodes($excerpt);
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, 170);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
//$excerpt = $excerpt.'... <a href="'.$permalink.'">more</a>';
return $excerpt;
}



//Custom Announcements Post Type
function my_custom_post_announcements() {
  $labels = array(
    'name'               => _x( 'Announcements', 'post type general name' ),
    'singular_name'      => _x( 'Announcements', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Announcement' ),
    'add_new_item'       => __( 'Add New Announcement' ),
    'edit_item'          => __( 'Edit Announcement' ),
    'new_item'           => __( 'New Announcement' ),
    'all_items'          => __( 'All Announcements' ),
    'view_item'          => __( 'View Announcement' ),
    'search_items'       => __( 'Search Announcements' ),
    'not_found'          => __( 'No Announcements found' ),
    'not_found_in_trash' => __( 'No Announcements found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Announcements'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our Announcement and annoucement specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
    'rewrite' => array( 'slug' => 'announcements','with_front' => FALSE),
    'capability_type' => 'post',
    'hierarchical' => false,
  );
  register_post_type( 'announcement', $args ); 
}
add_action( 'init', 'my_custom_post_announcements' );



//Custom Galleries Post Type
function my_custom_post_galleries() {
  $labels = array(
    'name'               => _x( 'Galleries', 'post type general name' ),
    'singular_name'      => _x( 'Galleries', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Gallery' ),
    'add_new_item'       => __( 'Add New Gallery' ),
    'edit_item'          => __( 'Edit Gallery' ),
    'new_item'           => __( 'New Gallery' ),
    'all_items'          => __( 'All Galleries' ),
    'view_item'          => __( 'View Gallery' ),
    'search_items'       => __( 'Search Galleries' ),
    'not_found'          => __( 'No Galleries found' ),
    'not_found_in_trash' => __( 'No Galleries found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Galleries'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our Gallery and gallery specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    'has_archive'   => false,
    'rewrite' => array( 'slug' => 'galleries','with_front' => TRUE),
    'capability_type' => 'post',
    'hierarchical' => false,
  );
  register_post_type( 'galleries', $args ); 
}
add_action( 'init', 'my_custom_post_galleries' );




function em_event_output_condition_filter($replacement, $condition, $match, $EM_Event){
    // Checks for has_test conditional
    if(is_object($EM_Location) && preg_match('/^has_(contactname)$/', $condition, $matches)){
        if(array_key_exists($matches[1], $EM_Event->event_attributes) && !empty($EM_Event->event_attributes[$matches[1]]) ){
            $replacement = preg_replace("/\{\/?$condition\}/", '', $match);
        }else{
            $replacement = '';
        }
    }
    
    return $replacement;
}
add_filter('em_event_output_condition', 'em_event_output_condition_filter', 1, 4);


