<!-- This code outputs downloads -->
<?php if( have_rows('attached_files') ): ?>
<div class="general-location-wrapper">
    
    <h3>Resources</h3>

    <ul class="downloads-list">
 
        <?php while( have_rows('attached_files') ): the_row(); 
            // vars
            $link = get_sub_field('file');
            $title = get_sub_field('file_name')
        ?>
 
        <li>
            <?php echo $title; ?> - 
            <?php if( $link ): ?>
                <a href="<?php echo $link; ?>">
            <?php endif; ?>
 
            Download
 
            <?php if( $link ): ?>
                </a>
            <?php endif; ?>
        </li>
        
        <?php endwhile; ?>

    </ul>

 </div>
 
<?php endif; ?>