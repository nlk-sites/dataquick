<?php
/**
 * @package DQ
 * @subpackage DQ
 * @since DQ 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="page">
	<div id="hdr">
    	<a href="<?php echo home_url( '/' ); ?>" id="dq"><?php bloginfo( 'name' ); ?></a>
        <div id="abt"><a href="<?php echo get_permalink(2); ?>">About Us</a> &nbsp;|&nbsp; <a href="<?php echo get_permalink(133); ?>">Manage My Account</a> &nbsp;|&nbsp; <a href="<?php echo get_permalink(1881); ?>">Vendors</a></div>
        <ul id="ipc">
        <?php wp_list_pages('include=21,19,2965&title_li='); ?>
        </ul>
        <div class="contact typeface-js"><a href="<?php echo get_permalink(137); ?>">Contact Us 1.866.774.3282 (DATA)</a></div>
        <div id="drp"><div class="t"></div><div class="e"></div></div>
        <select name="ql" onchange="window.location.href = this.value;" id="ql">
          <option selected value="#">Customer Login</option>
        </select>
        <?php wp_nav_menu(array('container' => '','theme_location'=>'logins','menu_id'=>'clogins')); ?>
	</div>
	<div id="main">
