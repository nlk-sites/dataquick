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
<div id="top" class="typeface-js">
<div class="h1">Customer Testimonials</div>
<div class="h2"><p>Sharing Success Stories</p></div>
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
                    
                    <div class="postmeta">
                        <span class="cats"><?php if ( count( get_the_category() ) ) : ?>Categories : <?php echo get_the_category_list(', '); ?><?php endif; ?></span>
                        <?php if (function_exists('sharethis_button')) { sharethis_button(); } ?>
                    </div>
				</div><!-- #post-## -->

<?php endwhile; // end of the loop. ?>

</div>
<ul id="rt">
<?php dynamic_sidebar('testimonials'); ?>
</ul>
</div>
<?php get_footer(); ?>