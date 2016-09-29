<?php
/**
 * Template name : NSSL-Product
 */

get_header(); ?>
<section class="blog-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="wrapper-left-bordered">
                    <?php get_sidebar(); ?>
                </div>
            </div>

            <div class="col-sm-9">
                <div class="row">
                <h4 class="title-divider"><?php the_title();?> <span></span></h4>
                    <?php
                    while ( have_posts() ) : the_post();
                        the_content();
                    endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.blog content end -->

<?php get_footer();?>
