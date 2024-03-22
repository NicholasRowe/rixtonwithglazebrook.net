
<div id="announcementsWrapper">

    <?php if( have_rows('announcements') ): ?>
        
    <div class="row">

        <div class="large-12 columns">

            <div class="main-slider">

                <div id="orbit" class="data-orbit-list" data-orbit data-options="
                    animation:slide;
                    animation_speed:1000;
                    timer_speed: 3500;
                    navigation_arrows:true;
                    bullets:false;
                    slide_number:true;
                    pause_on_hover:false;
                    timer: true;
                    swipe: true;">

                    <?php while( have_rows('announcements') ): the_row(); 
                        // vars
                        $title = get_sub_field('announcement_title');
                        $text = get_sub_field('announcement_text');
                    ?>

                        <div class="slide">
                        
                            <div class="slideText"><?php echo $text; ?></div>
                            <div class="slideTitle"><?php echo $title; ?></div>
                            <img/>
                            
                        </div>               

                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>

    <?php endif; ?>

</div><!--end announcementsWrapper-->
