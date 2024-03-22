<!-- This code outputs a gallery -->

<?php 
    $images = get_field('location_gallery');

    if( $images ): 
?>

<div class="general-location-wrapper">
    <h3>Our Gallery</h3>

    <?php 
    $image_ids = get_field('location_gallery', false, false);

    $shortcode = '[gallery ids="' . implode(',', $image_ids) . '"]';

    $gallery = do_shortcode( $shortcode );

    echo slb_activate($gallery);

    ?>

    <div style="clear:both;"></div>
</div>
<?php endif; ?>