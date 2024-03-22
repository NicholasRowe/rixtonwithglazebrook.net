
<?php 

// Query custom post type

?>

<style type="text/css">

    .colour-caption {
        display: inline-block !important;
        float: right !important;
        padding: 5px 12px;
        margin-right: -20px;
        margin-bottom: -10px;
    }
    
    .caption-blue {
        background: rgba(0, 60, 255, 0.6);
    }

    .caption-pink {
        background: rgba(210, 0, 237, 0.6);
    }

    .caption-green {
        background: rgba(0, 222, 52, 0.6);
    }

    .caption-orange {
        background: rgba(251, 177, 0, 0.6);
    }

    .caption-black {
        background: rgba(0, 0, 0, 0.5);
    }

    .caption-plum {
        background: rgba(174, 8, 87, 0.5);
    }

    .caption-blue h2, .caption-blue h3 {
       
    }
</style>

    

<div class="row">

    <div class="large-12 columns">


        <div class="main-slider">


        <?php
        // check if the repeater field has rows of data
        if( have_rows('news_slider') ): ?>
       <ul data-orbit data-options="animation:fade;
            animation_speed:250;
            timer_speed: 3500;
            navigation_arrows:true;
            bullets:true;
            slide_number: true;">
        <?php
        // loop through the rows of data
        while ( have_rows('news_slider') ) : the_row(); ?>
    
        <li>
        <img src="<?php echo the_sub_field('slider_image'); ?>" alt="" />

        <?php if (get_sub_field('background_box')): ?>

        <div class="orbit-caption">
        <div class="colour-caption <?php echo the_sub_field('background_box_colour');?>">

        <?php else: ?>

        <div class="orbit-caption">

        <?php endif; ?>
       


        <h2><?php echo the_sub_field('slider_title'); ?></h2>
        <h3><a href="<?php echo the_sub_field('slider_link'); ?>"><?php echo the_sub_field('slider_sub_title'); ?></a></h3>
        </div>
        <?php if (get_sub_field('background_box')): ?>
            </div>
         <?php endif; ?>   
        </li>
    

   <?php endwhile; ?>
      </ul>

<?php else :

    // no rows found

endif;

?>


        </div>

    </div>
    

</div>



