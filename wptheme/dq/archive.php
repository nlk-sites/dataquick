<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package DQ
 * @subpackage DQ
 * @since DQ 1.0
 */

get_header(); ?>
<div id="fx">
<div id="top" class="typeface-js">
<?php
	/* Queue the first post, that way we know
	 * what date we're dealing with (if that is the case).
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
		
if ( is_day() ) : 
echo '<div class="h1">'. get_the_date() .'</div><div class="h2">Daily Archives</div>';
elseif ( is_month() ) : 
echo '<div class="h1">'. get_the_date('F Y') .'</div><div class="h2">Monthly Archives</div>';
elseif ( is_year() ) : 
echo '<div class="h1">'. get_the_date('Y') .'</div><div class="h2">Yearly Archives</div>';
else :
echo '<div class="h1">Blog Archives</div>';
endif; ?>
</div>
<div id="left">
<?php
	/* Since we called the_post() above, we need to
	 * rewind the loop back to the beginning that way
	 * we can run the loop properly, in full.
	 */
	rewind_posts();

	/* Run the loop for the archives page to output the posts.
	 * If you want to overload this in a child theme then include a file
	 * called loop-archives.php and that will be used instead.
	 */
	 get_template_part( 'loop', 'archive' );
?>
</div>
<ul id="rt">
<?php dynamic_sidebar('blog'); ?>
</ul>
</div>
<?php get_footer(); ?>
