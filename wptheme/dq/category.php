<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package DQ
 * @subpackage DQ
 * @since DQ 1.0
 */

get_header(); ?>
<div id="fx">
<div id="top" class="typeface-js">
<div class="h1"><?php single_cat_title(); ?></div>
<div class="h2"><?php echo category_description(); ?></div>
</div>
<div id="left">
<?php
/* Run the loop for the category page to output the posts.
* If you want to overload this in a child theme then include a file
* called loop-category.php and that will be used instead.
*/
get_template_part( 'loop', 'category' );
?>
</div>
<ul id="rt">
<?php
if(is_category('testimonials')) {
dynamic_sidebar('testimonials');
} else dynamic_sidebar('blog');
?>
</ul>
</div>
<?php get_footer(); ?>
