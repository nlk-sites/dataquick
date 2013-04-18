<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package DQ
 * @subpackage DQ
 * @since DQ 1.0
 */

get_header(); ?>
<div id="fx">
<div id="top" class="typeface-js">
<div class="h1">Blog</div>
<div class="h2"><p>The Latest Intelligence from our Experts</p></div>
</div>
<div id="left">
<?php
/* Run the loop to output the posts.
* If you want to overload this in a child theme then include a file
* called loop-index.php and that will be used instead.
*/
global $query_string, $wp_query;
parse_str( $query_string, $args );
$args['category__not_in'] = array(1,5,6,7);
query_posts($args);
get_template_part( 'loop', 'index' );
?>
</div>
<ul id="rt">
<?php dynamic_sidebar('blog'); ?>
</ul>
</div>
<?php get_footer(); ?>
