<?php if( have_rows('page_slide') ): ?>
    
<div class="row">

    <div class="large-12 columns">

        <div class="main-slider">

            <ul data-orbit data-options="animation:fade;
            animation_speed:250;
            timer_speed: 3500;
            navigation_arrows:true;
            bullets:true;
            slide_number: true;">

            <?php while( have_rows('page_slide') ): the_row(); ?>

            <li>
                <img src="<?php the_sub_field('slider_image'); ?>" alt="" />
            </li>

            <?php endwhile; ?>
            </ul>
        </div>
    </div>
</div>

<?php endif; ?>