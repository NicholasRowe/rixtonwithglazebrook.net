<?php

/**
* Template Name: Contact
*/

get_header(); ?>

 <script type="text/javascript">

 function initialize() {
  var myLatlng = new google.maps.LatLng(53.427867, -2.435781);
  var mapOptions = {
    zoom: 16,
    center: myLatlng,
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">Hamilton Davies Trust</h1>'+
      '</div>';

        var infowindow = new google.maps.InfoWindow({
      content: contentString
  });



  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Hello World!'
  });
 google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });

 infowindow.open(map, marker);


}


function loadScript() {
  var script = document.createElement('script');
  script.type = 'text/javascript';
  script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDIugGK3McghzsZwhc2XlZ4tEMugcXCGVY&sensor=false&' +
      'callback=initialize';
  document.body.appendChild(script);
}

window.onload = loadScript;

    </script>



<div class="row">

    <div class="main-content">

        <div class="large-3 columns">

            <aside class="main-sidebar">

              <h3>Address</h3>
              <p>Hamilton Davies House<br>
              117c Liverpool Road<br>
              Cadishead<br>
              Manchester<br>
              M44 5BG</p>

              <p>Telephone: 0161 222 4003</p>

              <p>Email: <a href="mailto:hello@hamiltondavies.org.uk?Subject=Hello" target="_top">hello@hamiltondavies.org.uk</a></p>
            
            </aside>
        </div>

        <div class="large-9 columns">

        <?php get_template_part( 'slideshow-page' ); ?>

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

              <div class="title-strip">

                <?php if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                } ?>

              </div>

              <section>

                <h2 class="page-title"><?php the_title(); ?></h2>

                <div class="map-wrapper">
                  <div id="map-canvas"/></div>
                </div>


                <div class="email-form-wrapper">
                  <h3>Email Us</h3>
                  <?php echo do_shortcode('[contact-form-7 id="360" title="Contact form 1"]') ?>
                </div>
                
                <?php endwhile; else: ?>

                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

                <?php endif; ?>

              </section>
    </div>
<?php get_footer(); ?>
