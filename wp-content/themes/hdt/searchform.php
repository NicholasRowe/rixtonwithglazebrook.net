<form action="<?php echo home_url( '/' ); ?>" class="search-form" method="get">
    <fieldset>
        <label for="search">Search in <?php echo home_url( '/' ); ?></label>
        <input type="text" name="s" id="search" placeholder="Search site" class="search-field" value="<?php the_search_query(); ?>" />
        <button type="submit" class="search-submit"></button>
    </fieldset>
</form>