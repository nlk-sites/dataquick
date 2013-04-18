<?php
/**
 * Template Name: Place an Order
 *
 * @package DQTitle
 * @subpackage DQTitle
 * @since DQTitle 1.0
 */

get_header(); ?>


<script type="text/javascript">
	jQuery(document).bind('gform_post_render', function(){
		$("div.validation_error").append('<ul></ul>');
		$("div.validation_message").each(function() {
			var str = $(this).text();
			$("div.validation_error ul").append('<li>' + str + '</li>');
		});
	});
</script>


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

<?php /* Immediate Access links box
	<div id="rt">
	<div class="b get c">
	<h3>Immediate Access</h3>
	<?php
	if($demo_link) echo '<a href="'.$demo_link.'" rel="nofollow" class="ar" target="_blank"><span class="demo"></span>View Demo</a>';
	if($login_link) echo '<a href="'.$login_link.'" rel="nofollow" class="ar">Customer Login</a>';
	?>
	<a href="http://www.relstitle.info/PlaceOrder.aspx" class="ar" target="_blank">Place an Order</a>
	<a href="<?php echo get_permalink(57); ?>" class="ar last">Branch Locator</a>
	<div></div>
	</div>
	<?php
	$attachments =& get_children('post_type=attachment&post_parent=' . $post->ID .'&orderby=menu_order&order=asc' );
	if(count($attachments) > 0) { ?>
	<div id="dl"><h4>Download Product Literature</h4>
	<select><option value="#" selected="selected">Select Download</option>
	<?php foreach($attachments as $pdf) echo '<option value="'.$pdf->guid.'">'.$pdf->post_title.'</option>'; ?>
	</select>
	</div>
	<?php }
	?>
	</div>
*/ ?>
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