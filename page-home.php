<?php
/**
 * Template Name: Home page
 */

get_header(); ?>

<!-- banner start -->
<section id="banner" class="banner">
    <img class="banner-img" height="500px" src="<?php echo get_template_directory_uri();?>/images/frontpage-banner.jpg" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
    <div class="container-holder"></div>
    <!-- /.container-holder end -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="banner-block">
                        <p>MACHADKA HORUMARINTA IYO FALANGAYNTA <br />CILMIBAARISTA EE SOOMAALIYA</p>
                        <div class="flex_text text-slider">
                            <ul class="slides">
                                <li><h2>Democracy and Governance (D&G)</h2></li>
                                <li><h2>Security and rule of Law</h2></li>
                                <li><h2>Peace through Business Development</h2></li>
                                <li><h2>Sustainable Environment and Natural Resources Management</h2></li>
                                <li><h2>Education Management and Institutional Capacity Investment</h2></li>
                                <li><h2>Gender and Women’s Empowerment</h2></li>
                            </ul>
                        </div><!--/.text-slider-->
                    </div><!-- /.banner-block -->
                </div>
            </div>
        </div>
        <div class="recent-cause">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <span class="most-recent"></span>
                        <h3>providing quality research and development services to the public and private entities in Puntland/Somalia</h3>
                    </div>
                    <div class="col-sm-6">
                        <div class="promo">
                            <a href="<?php echo bloginfo('url'); ?>/contact-us" class="btn default-btn light-blue">CONTACT US</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.recent-cause end -->
</section>
<!-- banner end -->
<section class="blog-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h4 class="title-divider"><?php the_title();?> <span></span></h4>
                <?php
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile; ?>
            </div>
            <div class="col-sm-4">
                <div class="wrapper-left-bordered">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.blog content end -->
<?php get_footer(); ?>
