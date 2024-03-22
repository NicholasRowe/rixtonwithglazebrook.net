<?php


// template for displaying sector featured projects and small projects
// /sector/community/


get_header(); ?>


<?php if( is_tax() ) {
    global $wp_query;
    $term = $wp_query->get_queried_object();
    $title = $term->name;
} ?>

<div class="row">

    <div class="main-content">

        <div class="large-3 columns">

            <aside class="main-sidebar">


                <!-- archive tax-sector term-education term-15 -->


                <?php

                if (is_tax('sector', 'community')) {    
// the page is "About", or the parent of the page is "About"
                    $projectimg = 'project-community.png';

                } elseif (is_tax('sector', 'education')) {  
                    $projectimg = 'project-education.png';

                } elseif (is_tax('sector', 'recreation')) { 
                    $projectimg = 'project-recreation.png';

                } elseif (is_tax('sector', 'regeneration')) { 
                    $projectimg = 'project-regeneration.png';

                }
                else { 
$projectimg = 'community.jpg'; // just in case we are at an unclassified page, perhaps the home page
}   

echo ' <img src="'.get_stylesheet_directory_uri().'/assets/img/'.$projectimg.'"> ';

?>

<!-- <h3><?php echo $title ?> Menu</h3> -->

<p class="page-description"><?php $description = term_description();

echo $description;

 ?></p>


<?php if (is_tax() || is_category() || is_tag() ){
    $qobj = get_queried_object();
// var_dump($qobj); // debugging only

// concatenate the query
    $args = array(
// 'posts_per_page' => 1,
        'orderby' => 'date',
        'tax_query' => array(
            array(
                'taxonomy' => $qobj->taxonomy,
                'field' => 'id',
                'terms' => $qobj->term_id,
//    using a slug is also possible
//    'field' => 'slug', 
//    'terms' => $qobj->name
                )
            )
        );

    $random_query = new WP_Query( $args );
// var_dump($random_query); // debugging only

    if ($random_query->have_posts()) {
        echo "<ul>";
        while ($random_query->have_posts()) {
            $random_query->the_post();
// Display

            ?>
<!-- 
            <li>

                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">

                    <?php the_title(); ?>

                </a>

            </li> -->

            <?php 

        }
        echo "</ul>";
    }
}  

wp_reset_postdata();

?>

</aside>

</div>

<div class="large-9 columns">

    <?php get_template_part( 'sector-slideshow' ); ?>

    <div class="title-strip">
        
        <?php if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb('<p id="breadcrumbs">','</p>');
        } ?>

    </div>


    <section class="sector-overview">

    <h2 class="page-title">Area of Focus: <span><?php echo $title ?></span></h2>

        <div class="row">

            <?php if (is_tax() || is_category() || is_tag() ){
                $qobj = get_queried_object();

                $args = array(

                    'orderby' => 'date',
                    'posts_per_page' => 4,
                    'tax_query' => array(
                        array(
                            'taxonomy' => $qobj->taxonomy,
                            'field' => 'id',
                            'terms' => $qobj->term_id,

                            )
                        )
                    );

                $random_query = new WP_Query( $args );


                if ($random_query->have_posts()) {

                    while ($random_query->have_posts()) {
                        $random_query->the_post();

                        ?>

                        <div class="large-6 medium-6 small-12 columns">

                            <?php the_post_thumbnail('sector-img-thumb'); ?>

                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                            <p><?php echo excerpt(18);  ?></p>

                        </div>

                        <?php 

                    }

                }
            }  

            wp_reset_postdata();

            ?>

        </div>

    </section>

</div>

<!-- <p><a class='inline' href="#inline_content">Inline HTML</a></p> -->

<div style='display:none'>
    <div id='inline_content' style='padding:10px; background:#fff;'>
        <p><strong>This content comes from a hidden element on this page.</strong></p>
        <p>The inline option preserves bound JavaScript events and changes, and it puts the content back where it came from when it is closed.</p>
        <p><a id="click" href="#" style='padding:5px; background:#ccc;'>Click me, it will be preserved!</a></p>

        <p><strong>If you try to open a new Colorbox while it is already open, it will update itself with the new content.</strong></p>
        <p>Updating Content Example:<br />
            <a class="ajax" href="../content/ajax.html">Click here to load new content</a></p>
        </div>
    </div>

    <script>
        $(document).ready(function(){
//Examples of how to assign the Colorbox event to elements
$(".group1").colorbox({rel:'group1'});
$(".group2").colorbox({rel:'group2', transition:"fade"});
$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
$(".group4").colorbox({rel:'group4', slideshow:true});
$(".ajax").colorbox();
$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
$(".inline").colorbox({inline:true, width:"50%"});
$(".callbacks").colorbox({
    onOpen:function(){ alert('onOpen: colorbox is about to open'); },
    onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
    onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
    onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
    onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
});

$('.non-retina').colorbox({rel:'group5', transition:'none'})
$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});

//Example of preserving a JavaScript event for inline calls.
$("#click").click(function(){ 
    $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
    return false;
});
});
</script>



<?php get_sidebar(); ?>
<?php get_footer(); ?>


