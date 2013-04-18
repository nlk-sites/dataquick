<?php
/**
 * Template Name: Wide Page
 *
 * @package DQ
 * @subpackage DQ
 * @since DQ 1.0
 */

get_header(); ?>
<div id="fx">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div id="content">
<?php
$demo_link = get_post_meta($post->ID,'demo_link',true);
$login_link = get_post_meta($post->ID,'login_link',true);
the_content();
wp_link_pages( array( 'before' => '<div class="page-link">Pages:', 'after' => '</div>' ) ); 
if(is_page(139)) { /*sitemap*/
	wp_list_pages('title_li=&exclude=139');
	echo '</div>';
} ?>
<?php edit_post_link( 'Edit', '<p class="edit-link">', '</p>' ); ?>
</div>
<?php endwhile;

$sidemenu = '';
$firstlnk = '';
if(in_array(21,$post->ancestors) || is_page(21)) {
	$sidemenu = 'industry';
	$firstlnk = '<a href="'. get_permalink(21) .'" class="first typeface-js">Solutions</a>';
}
elseif(in_array(19,$post->ancestors) || is_page(19)) {
	$sidemenu = 'products';
	$firstlnk = '<a href="'. get_permalink(19) .'" class="first typeface-js">Products</a>';
}
elseif(in_array(2,$post->ancestors) || is_page(array(2,139))) {
	$sidemenu = 'about';
	$firstlnk = '<a href="'. get_permalink(2) .'" class="first typeface-js">About</a>';
}
if($sidemenu != '') {
	echo '<div id="lc">'.$firstlnk;
	wp_nav_menu(array('container' => '','menu_id'=>'','theme_location'=>$sidemenu));
	?>
    <a href="<?php echo get_permalink(137); ?>" class="cs"><strong>Customer Support</strong>Answers from our Experts</a>
	</div>
<?php } ?>
</div>
<?php get_footer(); ?>
