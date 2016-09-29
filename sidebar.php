<?php
/**
 * The sidebar containing the main widget area.
 */
?>
<aside>
    <?php 
        if ( is_active_sidebar( 'theme_sidebar_widget' ) ) :
            dynamic_sidebar( 'theme_sidebar_widget' ); 
        endif; ?>
</aside>
