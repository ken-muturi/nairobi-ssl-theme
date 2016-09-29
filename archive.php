<?php
/**
 * The template for displaying Archive pages. 
 * Used to display archive-type pages if nothing more specific matches a query.
 */

get_header(); ?>

<!-- Next Upcoming event start -->
<section id="event" class="event norm-bg">
   <div class="color-overlay">
       	<div class="container">
	       	<div class="row">
	       		<div class="col-sm-4">
	       		    <div id="next-event-content-block-left" class="content-block-left">
	       		    	<h3 class="head-pro">
						<?php
						global $wp_query;
						$cp_taxonomies = get_taxonomies(array( 'public'   => true, '_builtin' => false ));
						$value    = get_query_var($wp_query->query_vars['taxonomy']);
						$tax = get_term_by('slug', $value, $wp_query->query_vars['taxonomy']);

						if ( is_day() ) 
						{
							printf( __( 'Daily Archives: %s'), '<span>' . get_the_date() . '</span>' );
						}
						elseif ( is_month() ) 
						{
							printf( __( 'Monthly Archives: %s'), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format') ) . '</span>' );
						}
						elseif ( is_year() ) 
						{
							printf( __( 'Yearly Archives: %s'), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format') ) . '</span>' );
						}
						elseif(in_array($tax->taxonomy, $cp_taxonomies))
						{
							_e( "Category - {$tax->name} ({$tax->count}) ");
						}	
						else
						{
							_e( 'Archives');
						}?>	       		    		
	       		    	</h3>
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
			<div class="col-sm-9">
				<div class="single-blog-content">
					<?php if ( have_posts() ) : 
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/* Include the post format-specific template for the content. If you want to
						 * this in a child theme then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );

					endwhile;
					?>

					<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; ?>

				</div>
			</div>
			<div class="col-sm-3">
				<?php get_sidebar(); ?>
				<!-- sidebar end here -->
			</div>			
		</div>
	</div>
</section>
<?php get_footer(); ?>