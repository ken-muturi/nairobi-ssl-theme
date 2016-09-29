<?php
/**
 * The main template file.
 */

get_header(); ?>
<!-- Next Upcoming event start -->
<section id="event" class="event norm-bg">
   <div class="color-overlay">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div id="next-event-content-block-left" class="content-block-left">
                        <p>Be apart of it and help us</p>
                    </div><!-- /.content-block-left -->
                </div>
                <div class="col-sm-8 text-right">
                    <div id="next-event-content-block-right" class="content-block-right">
                        <h4>Search Results</h4>
                    </div><!-- /.content-block-right -->                        
                </div>
            </div>
       </div>
   </div><!-- /.color-overlay -->       
</section>

<section class="blog-content">
   <div class="container">
        <div class="row">
            <div class="col-md-8">
            <h3 class="title-divider">Search Results<span></span> </h3>
            <?php 
            if ( have_posts() ) : 
                while ( have_posts() ) : the_post(); ?>
                    <h4> <a href='<?php the_permalink();?>'><?php the_title();?></a> </h4>
                    <?php the_excerpt();?>
                    <?php 
                endwhile; 
            else :
                _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.'); 
                get_search_form();
            endif; ?>      
            </div>
            <div class="col-md-4">
                <div class="wrapper-left-bordered">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
