<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="//use.typekit.net/csr7gzb.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
   
<style type="text/css">

</style>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-THGBVTL8M8"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-THGBVTL8M8');
</script>
    
    <?php wp_head(); ?>

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/screen.css" type="text/css" media="all"/>



</head>
<body <?php body_class(); ?>>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-84085337-1', 'auto');
  ga('send', 'pageview');

</script>

<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->



<header class="site-header">
<div href="mailto:"></div>

    <div class="row">

        <div class="large-12 columns">

            <div class="sub-header">

                <div class="row">

                <!-- <a href="#" class="quick-link">Click for Quick Navigation</a> -->

                <div class="medium-6 large-6 columns">

                   <ul class="cross-links">
                   <li><a href="http://www.irlamandcadishead.net/" title="<?php bloginfo('name'); ?>" class="logo">

                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/irlam-header-link.png" alt="">

                    </a></li>

                    <li><a href="http://www.hamiltondavies.org.uk" title="<?php bloginfo('name'); ?>" class="logo">

                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/hdt-header-link.png" alt="">

                    </a></li>

                   </ul>

                </div>

                <div class="medium-6 large-6 columns">

                    <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>" class="logo">

                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png" alt="">

                    </a>

                </div>

            </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="large-12 columns">

            <nav class="top-bar" data-topbar>

                <ul class="title-area">

                    <li class="name"></li>

                    <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>

                </ul>

                <section class="top-bar-section">

                <?php $args = array(
                    'authors'      => '',
                    'child_of'     => 0,
                    'date_format'  => get_option('date_format'),
                    'depth'        => 1,
                    'echo'         => 1,
                    'exclude'      => '',
                    'include'      => '',
                    'link_after'   => '',
                    'link_before'  => '',
                    'post_type'    => 'page',
                    'post_status'  => 'publish',
                    'show_date'    => '',
                    'sort_column'  => 'menu_order, post_title',
                        'sort_order'   => '',
                    'title_li'     => __('Pages'), 
                    'walker'       => ''
);              ?>

                  <?php wp_nav_menu( $args ); ?>

                    <div class="right">
                        <div class="desktop-search">
                            <?php get_search_form(); ?>
                        </div>
                    </div>

                </section>



            </nav>

            <div class="mobile-search"><?php get_search_form(); ?></div>   

        </div>

    </div>

</header>



<?php 

// if (is_tax( 'sector' ) ) {
//     get_template_part( 'sector-slideshow' );

// } else {
//     get_template_part( 'slideshow' );
// } 
?>












