<?php
/**
 * The Template for displaying all single posts.
 *
 * @package DQ
 * @subpackage DQ
 * @since DQ 1.0
 */

get_header(); ?>
<div id="fx">
<?php if(in_category('companynews')) get_template_part('single','newsevents');
elseif(in_category('testimonials')) get_template_part('single','testimonial');
else { ?>
<div id="top" class="typeface-js">
<div class="h1">Blog</div>
<div class="h2"><p>The Latest Intelligence from our Experts</p></div>
</div>
<div id="left">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h2 class="entry-title"><?php the_title(); ?></h2>
					<div class="by">posted by : <?php echo get_the_author(); ?> on <?php echo get_the_date(); ?><?php edit_post_link( 'Edit Post', ' : ', '' ); ?></div>
					<div class="entry">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry -->
				</div><!-- #post-## -->


		<?php if(!in_category('testimonials')) comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>

</div>
<ul id="rt">
<?php 
if(is_category('testimonials')) {
dynamic_sidebar('testimonials');
} else dynamic_sidebar('blog'); ?>
</ul>
<?php } ?>
</div>
<?php get_footer(); ?>