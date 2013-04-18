<?php
/**
 * DQTitle functions and definitions
 *
 * @package DQTitle
 * @subpackage DQTitle
 * @since DQTitle 1.0
 */

add_action( 'after_setup_theme', 'dqtitle_setup', 99 );

if ( ! function_exists( 'dqtitle_setup' ) ):
function dqtitle_setup() {
	// remove unneeded menu locations from the main DQ theme
	unregister_nav_menu('industry');
	unregister_nav_menu('products');
	unregister_nav_menu('about');
	// add our own couple menu locations
	register_nav_menus( array(
		'main' => 'Main Menu',
		'bottombar' => 'Bottom Bar',
	));
	
	remove_filter('body_class','dq_bodyclass');
	add_filter('body_class','dqtitle_bodyclass');
}
endif;

function dqtitle_bodyclass($classes) {
	if ( is_page() ) {
		global $post;
		if(is_page_template('dqrels.php')) {
			$classes[] = 'rels';
			if(is_page(7)) $classes[] = 'lend';
		} elseif(is_page_template('dqdirect.php')) {
			$classes[] = 'dir';
		} elseif(!is_page_template('dqhome.php')) {
			$classes[] = 'cus';
			if ( is_page('title-products') ) $classes[] = 'title';
			if ( is_page('closings') ) $classes[] = 'closings';
			if ( is_page('other') ) $classes[] = 'other';
		}
	} else {
		if(!is_home() && (is_category('companynews') || in_category('companynews') || is_search())) {
			$classes[] = 'col3';
			$classes[] = 'abt';
		} elseif(is_archive() || is_home() || is_single()) $classes[] = 'blog';
			
	}
	return $classes;
}