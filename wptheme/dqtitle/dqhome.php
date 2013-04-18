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
<a href="http://www.dqnews.com/" class="hdr" target="_blank"><span class="typeface-js">DQ News</span><span class="ar"></span></a>
<div class="inside" id="newshere">
Loading...
</div>
<a href="http://www.dqnews.com/" class="more" target="_blank">More in DQ News &raquo;</a>
</div>
<div class="b dqb">
<a href="http://www.dataquick.com/blog/" class="hdr" target="_blank"><span class="typeface-js">DataQuick Blog</span><span class="ar"></span></a>
<div class="inside">
<?php
/* rather than using own site blogs, feed from dataquick.com...
global $post;
$myposts = get_posts('numberposts=2&cat=-1,-5,-6,-7');
foreach($myposts as $post) :
//	echo '<pre style="display:none">'. print_r($post,true) .'</pre>';
echo '<h3><a href="'. get_permalink() .'">'. dq_spaceoff(get_the_title(),41) .'</a></h3><p>';
if($post->post_excerpt) {
	echo $post->post_excerpt;
} else {
	echo dq_spaceoff(strip_tags($post->post_content));
}
echo '<br /><a href="'. get_permalink() .'">READ MORE</a></p>';
endforeach;
*/
		$nlkfeed = 'http://www.dataquick.com/feed/';
		include_once(ABSPATH . WPINC . '/feed.php');
		$rss = fetch_feed($nlkfeed);
		$instamax = 0;
		if (!is_wp_error( $rss ) ) { // Checks that the object is created correctly 
			// Figure out how many total items there are, but limit it to 5. 
			$instamax = $rss->get_item_quantity(2); 
			
			// Build an array of all the items, starting with element 0 (first element).
			$rss_items = $rss->get_items(0, $instamax); 
			if ($instamax > 0) {
				// Loop through each feed item and display each item as a hyperlink.
				$itemcount = 0;
				foreach ( $rss_items as $item ) {
					echo '<h3><a href="'. $item->get_link() .'" target="_blank">'. dq_spaceoff($item->get_title(),41) .'</a></h3><p>';
					echo dq_spaceoff(strip_tags($item->get_description()), 181);
					echo '<br /><a href="'. $item->get_link() .'" target="_blank">READ MORE</a></p>';
					
					/*
					$bod = $item->get_description();
					if ( strlen( $bod ) > 140 ) {
						$bod = substr( $bod, 0, strrpos( substr($bod,0,140), ' ') ) .'... <a href="'. $item->get_link() .'" target="_blank" class="rm">Read More</a>';
					}
					*/
					//echo '<p class="blogpost"><a href="'. $item->get_link() .'" target="_blank" class="title"><em>'. $item->get_title() .'</em><span class="rm">Read More</span></a></p>';
					$itemcount++;
				}
			}
		}
?>
</div>
<a href="http://www.dataquick.com/blog/" class="more" target="_blank">More in DQ Blog &raquo;</a>
</div>
<?php get_footer(); ?>