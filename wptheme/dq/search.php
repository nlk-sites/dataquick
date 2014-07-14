<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package DQ
 * @subpackage DQ
 * @since DQ 1.0
 */

get_header(); ?>
<div id="fx">
<div id="content">
    <div id="top" class="typeface-js">
        <div class="h1">Search Results</div>
        <div class="h2">For: <?php echo get_search_query(); ?></div>
    </div>
    <div class="main">
<?php if ( have_posts() ) : ?>
    <ul>
				<?php
				/* Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'search' );
				?>
                </ul>
<?php else : ?>
					<h2 class="entry-title">Nothing Found</h2>
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' ); ?></p>
						<?php get_search_form(); ?>
<?php endif; ?>
    </div>
    <div id="rt">
    <div class="b get c">
    <h3>Learn More</h3>
    <a href="<?php echo get_permalink(137); ?>" class="ar">Request more information</a>
    <div>Call 1 866-774 DATA</div>
    </div>
    </div>
</div>
<?php
	$sidemenu = 'about';
	$firstlnk = '<a href="'. get_permalink(2) .'" class="first typeface-js">About</a>';
    
	echo '<div id="lc">'.$firstlnk;
	wp_nav_menu(array('container' => '','menu_id'=>'','theme_location'=>$sidemenu));
	?>
    <a href="<?php echo get_permalink(137); ?>" class="cs"><strong>Customer Support</strong>Answers from our Experts</a>
	</div>
</div>
<?php get_footer(); ?>