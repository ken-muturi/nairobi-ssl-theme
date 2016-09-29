<?php
/**
 * Template Name: Contact us
 */
get_header(); ?>
<!-- Next Upcoming event start -->
<section id="event" class="event norm-bg">
   <div class="color-overlay">
       	<div class="container">
	       	<div class="row">
	       		<div class="col-sm-4">
	       		    <div id="next-event-content-block-left" class="content-block-left">
	       		    	<h3 class="head-pro"><?php echo strtoupper( get_the_title()); ?></h3>
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

<!-- map start -->
<div id="map" class="map"> </div>
<!-- map end -->

<!-- contact-form start -->
<div id="contact-form" class="contact-form">
	    <div class="container">
   		<div class="row">
   			<div class="col-sm-12">
   				<div class="contact-block wow fadeInDown" data-wow-duration="1s" data-wow-delay=".6s">
				<?php
					while ( have_posts() ) : the_post(); 
						the_content(); 
					endwhile; // end of the loop. 
				?>
   				</div><!-- /.contact-form -->
   			</div>
   		</div>
   	</div>
</div>
<!-- contact-form end -->
<?php get_footer(); ?>
