<?php
/**
* The default template for displaying content. Used for both single and index/archive/search.
*/

if ( has_post_thumbnail() ) :?>
	<div class="single-blog-image">
	<?php the_post_thumbnail('large', array( 'alt' => get_the_title() , 'class' => 'img-responsive')); ?>
	</div>
<?php endif; ?>

<h4><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h4> 		

<?php if ( is_search() ) : // Only display Excerpts for Search ?>
<div class="entry-summary">
	<?php the_excerpt(); ?>
</div><!-- .entry-summary -->

<?php else : 
	the_excerpt(); 
	wp_link_pages( array( 'before' => 'p' . __( 'Pages:'), 'after' => '</p>' ) );
endif; ?>
