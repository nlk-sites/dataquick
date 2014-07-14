<?php
/**
 * Template Name: Homepage
 *
 * @package DQTitle
 * @subpackage DQTitle
 * @since DQTitle 1.0
 */

get_header(); ?>
<div id="home" class="typeface-js">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>
<?php endwhile; ?>
</div>
<div id="hbar">
<?php get_sidebar('get'); ?>
</div>
<div class="b test">
<a href="http://www.dataquick.com/testimonials/" class="hdr" target="_blank"><span class="typeface-js">Customer Testimonial</span><span class="ar"></span></a>
<?php dynamic_sidebar('hometest'); ?>
<a href="http://www.dataquick.com/testimonials/" class="more" target="_blank">More Testimonials &raquo;</a>
</div>
<div class="b dqn">
<a href="http://www.dataquick.com/research/" class="hdr" target="_blank"><span class="typeface-js">Research Highlights</span><span class="ar"></span></a>

<?php
readfile('http://www.dataquick.com/researchhighlighthelper/');
?>
<a href="http://www.dataquick.com/research/" class="more" target="_blank">More in Research Highlights &raquo;</a>
</div>
<div class="b dqb">
	<a href="ratecalculators/" class="hdr"><span class="typeface-js">Rate Calculator</span><span class="ar"></span></a>
	<div class="inside">
		<h3><a href="ratecalculators/">Premium Rate Calculator</a></h3>
		<p>DataQuick Title offers fast and easy access to a rate calculator. Get quick rates with just a few clicks directly from the DataQuick Title website.<br /><br />
			<a href="ratecalculators/">Access Rate Calculator »</a>
		</p>
	</div>
</div>
<?php get_footer(); ?>