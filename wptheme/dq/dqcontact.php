<?php
/**
 * Template Name: Contact
 *
 * @package DQ
 * @subpackage DQ
 * @since DQ 1.0
 */

include('rc/recaptchalib.php');

// Get a key from https://www.google.com/recaptcha/admin/create
$publickey = "6LdujtMSAAAAANfLK4ZdJnuqauTa3iOIEE66ZID4";
$privatekey = "6LdujtMSAAAAANLMLCxYlwJ7RLl02V_Ajunaj4nF ";

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;

get_header(); ?>
<div id="fx">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div id="content">
<?php
the_content();
wp_link_pages( array( 'before' => '<div class="page-link">Pages:', 'after' => '</div>' ) ); ?>
<?php edit_post_link( 'Edit', '<p class="edit-link">', '</p>' ); ?>
<div id="contact"><div class="fx">
<div class="b">
<h3>New Customers</h3>
<a class="ar" href="#new">Questions / Set Up New Service</a>
<?php get_sidebar('web2lead'); ?>
<p><strong>Sales Center Hours:</strong><br />
Monday-Friday<br />
8:30am to 5:00pm (PST)<br /><br />
<strong>Sales Hotline:</strong> 1.888.604.DATA (3282)</p>
</div>
<div class="b">
<h3>Current Customers</h3>
<a class="ar" href="#request">Request Account Support</a>
<?php get_sidebar('web2case'); ?>
<p><strong>Customer Care Center Hours:</strong><br />
Monday-Friday<br />
8:30am to 5:00pm (PST)<br /><br />
<strong>Customer Care Center:</strong> 1.800.888.4492<br />
(for account status information or<br />
technical/product support)</p>
</div>
</div></div>
</div>
<?php endwhile;

$sidemenu = 'about';
$firstlnk = '<a href="'. get_permalink(2) .'" class="first typeface-js">About</a>';
	
echo '<div id="lc">'.$firstlnk;
wp_nav_menu(array('container' => '','menu_id'=>'','theme_location'=>$sidemenu));
?>
<a href="<?php echo get_permalink(137); ?>" class="cs"><strong>Customer Support</strong>Answers from our Experts</a>
</div>


</div>
<?php get_footer(); ?>
