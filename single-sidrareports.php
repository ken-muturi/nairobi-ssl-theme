<?php
/**
 * The template for displaying Single pages.
 *
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
	       		    	<h4>Machadka Horumarinta iyo Falangaynta <br>Cilmibaarista Ee Soomaaliya</h4>
	       		    </div><!-- /.content-block-right -->		       			
	       		</div>
	       	</div>
       </div>
   </div><!-- /.color-overlay -->       
</section>

<!-- blog content start -->
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
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>
<!-- /.blog content end -->  

<?php get_footer();?>
