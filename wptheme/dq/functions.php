<?php
/**
 * DQ functions and definitions
 *
 * @package DQ
 * @subpackage DQ
 * @since DQ 1.0
 */

add_action( 'after_setup_theme', 'dq_setup' );

if ( ! function_exists( 'dq_setup' ) ):
function dq_setup() {

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'industry' => 'Industry Menu',
		'products' => 'Products Menu',
		'about' => 'About Menu',
		'research' => 'Research Menu',
		'logins' => 'Customer Login',
	) );
	
	
	add_action( 'get_header', 'dq_header_check' );
	add_action( 'admin_init', 'dq_admin_init' );
}
endif;

function twentyten_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'twentyten_excerpt_length' );

function twentyten_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">READ MORE</a>';
}

function twentyten_auto_excerpt_more( $more ) {
	return '...<br />' . twentyten_continue_reading_link();
}
add_filter( 'excerpt_more', 'twentyten_auto_excerpt_more' );

function twentyten_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= twentyten_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'twentyten_custom_excerpt_more' );


function dq_bodyclass($classes) {
	if(is_page_template('dqrels.php')) {
		$classes[] = 'rels';
		if(is_page(7)) $classes[] = 'lend';
	}
	if(is_page_template('dqdirect.php')) {
		$classes[] = 'dir';
	}
	if(!is_home() && (is_category('companynews') || in_category('companynews') || is_search())) {
		$classes[] = 'col3';
		$classes[] = 'abt';
	} elseif(is_archive() || is_home() || is_single()) $classes[] = 'blog';
	
	global $post;
	if(is_page()) {
		$whatside = '';
		if(in_array(21,$post->ancestors) || is_page(21)) $whatside = 'ind';
		if(in_array(19,$post->ancestors) || is_page(19)) $whatside = 'pro';
		if(is_page(17)) $classes[] = 'cus';
		if(in_array(2965,$post->ancestors) || is_page(2965)) $whatside = 'cus';
		if(in_array(2,$post->ancestors) || is_page(array(2,139))) $whatside = 'abt';
		
		if($whatside!='') {
			if(is_page_template('dqwidepage.php')) $classes[] = 'col2';
			
			$classes[] = 'col3';
			$classes[] = $whatside;
		}
	}
	return $classes;
}
add_filter('body_class','dq_bodyclass');

if ( ! function_exists( 'twentyten_comment' ) ) :
function twentyten_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'twentyten'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

function twentyten_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => 'Homepage Testimonial',
		'id' => 'hometest',
		'description' => 'Customer Testimonial',
		'before_widget' => '<div class="inside">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => 'Research Highlight',
		'id' => 'researchhighlight',
		'description' => 'static content area',
		'before_widget' => '<div class="inside rh">',
		'after_widget' => '</div>',
		'before_title' => '<div style="display:none">',
		'after_title' => '</div>',
	) );
	register_sidebar( array(
		'name' => 'Blog Sidebar',
		'id' => 'blog',
		'description' => 'Right Sidebar on Blog pages',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => 'Testimonials Sidebar',
		'id' => 'testimonials',
		'description' => 'Right Sidebar on Testimonials pages',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => 'Homepage Alerts',
		'id' => 'halerts',
		'description' => 'Below "Immediate Access" on Homepage',
		'before_widget' => '<div id="%1$s" class="hal %2$s typeface-js"><div class="n">',
		'after_widget' => '</div><div class="e"></div></div>',
		'before_title' => '<span style="display:none">',
		'after_title' => '</span>',
	) );
}
add_action( 'widgets_init', 'twentyten_widgets_init' );

function twentyten_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'twentyten_remove_recent_comments_style' );

if ( ! function_exists( 'twentyten_posted_in' ) ) :
function twentyten_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

function dq_init() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js', false, '1.4', true);
		wp_enqueue_script('jquery');

		// load a JS file from my theme: js/theme.js
		wp_enqueue_script('xdomainajax', get_bloginfo('template_url') . '/jquery.xdomainajax.js', array('jquery'), '0.11', true);
		wp_enqueue_script('dqjs', get_bloginfo('template_url') . '/dq.js', array('jquery'), false, true);
		wp_enqueue_script('typeface', get_bloginfo('template_url') . '/typeface.js',array(),'0.15',true);
		wp_enqueue_script('arialroundbold', get_bloginfo('template_url') . '/arialroundedmtbold.typeface.js',array('typeface'),false,true);
		wp_enqueue_script('helveticaneue', get_bloginfo('template_url') . '/helveticaneue.typeface.js',array('typeface'),false,true);
		wp_enqueue_script('rockwell', get_bloginfo('template_url') . '/rockwell.typeface.js',array('typeface'),false,true);
	}
}
add_action('init', 'dq_init');

function dq_spaceoff($blurb,$cutoff = 195) {
	$shorter = substr($blurb,0,$cutoff);
	// one note : "&amp;" takes up just 1 character space.
	$amps = substr_count($shorter,'&#038;');
	if($amps) {
		$cutoff += 5*$amps;
		$shorter = substr($blurb,0,$cutoff);
	}
	
	if(strlen($blurb) < $cutoff) return $blurb;
	
	$shorter = substr($shorter,0,strrpos($shorter,' '));
	return $shorter . '...';
}


function dq_contentfilter($content) {
	if(is_page() && !is_page_template('dqrels.php') && !is_page_template('dqhome.php')) {
		// look for <span id="more- ...></span></h2> , wrap with <div id="top" />
		$moreat = strpos($content,'<span id="more-');
		if($moreat !== false) {
			$moreend = strpos($content,'</span></h2>',$moreat) + 12;
			$content = '<div id="top">'. substr($content,0,$moreend) .'</div><div class="main">'. substr($content,$moreend);
			if(!is_page(139)) $content .= '</div>';
			// HelveticaNeue apparently does not support TM in the <h1> on the page, so lets fix that
			$moreend = strpos($content,'</h1>');
			if($moreend !== false) {
				$content = str_replace('&trade;','<span class="tm">TM</span>',substr($content,0,$moreend)) . substr($content,$moreend);
			}
		}
	}
	return str_replace(array('<hr>','<hr />'),'<div class="hr"></div>',str_replace(array('&#8217;','&#8211;'),array('\'','-'),$content));
}
add_filter('the_content', 'dq_contentfilter');


if ( ! function_exists( 'dq_header_check' ) ):

function dq_header_check(){
	if($_REQUEST['dq_action'] == 'dqemail') {
		$dqproductline = $_REQUEST['dqproductline'];
		$mailto = false;
		$sub = 'New DataQuick.com Lead';
		if ( in_array($dqproductline, array('Property Research &amp; Marketing', 'Property Research & Marketing')) == false ) {
			if ( isset($_REQUEST['oid']) ) { // webtolead -> all go to sales@dataquick
				$mailto = 'sales@dataquick.com';
			} else { // webtocase
				$sub = 'Customer Service Inquiry from DataQuick.com';
				if ( $dqproductline == 'Residential Credit Solutions' ) {
					$mailto = 'csmail@dataquick.com';
				} else {
					$mailto = 'slsmail@dataquick.com';
					//$mailto = 'alexandersmith88@gmail.com';
				}
			}
		}
		if ( $mailto != false ) {
			$msg = '';
			
			// process!
			$fields = array(
				'Name' => '',
				'Email' => ''
			);
						
			if ( isset($_REQUEST['name']) ) {
				$fields['Name'] = esc_attr($_REQUEST['name']);
			} else {
				if ( isset($_REQUEST['first_name']) ) $fields['Name'] = esc_attr($_REQUEST['first_name']);
				if ( isset($_REQUEST['last_name']) ) $fields['Name'] .= ' '. esc_attr($_REQUEST['last_name']);
			}
			if ( isset($_REQUEST['company']) ) $fields['Company'] = esc_attr($_REQUEST['company']);
			if ( isset($_REQUEST['email']) ) $fields['Email'] = is_email($_REQUEST['email']) ? $_REQUEST['email'] : '';
			if ( isset($_REQUEST['phone']) ) $fields['Phone'] = esc_attr($_REQUEST['phone']);
			
			if ( isset($_REQUEST['street']) ) $fields['Address'] = esc_attr($_REQUEST['street']);
			if ( isset($_REQUEST['city']) ) $fields['City'] = esc_attr($_REQUEST['city']);
			if ( isset($_REQUEST['state']) ) $fields['State'] = esc_attr($_REQUEST['state']);
			if ( isset($_REQUEST['zip']) ) $fields['Zip'] = esc_attr($_REQUEST['zip']);
			if ( isset($_REQUEST['lead_source']) ) $fields['Lead Source'] = esc_attr($_REQUEST['lead_source']);
			if ( isset($_REQUEST['industry']) ) $fields['Industry'] = esc_attr($_REQUEST['industry']);
			if ( isset($_REQUEST['00N50000001ZDL2']) ) $fields['Description'] = wp_kses($_REQUEST['00N50000001ZDL2'], array());
			
			if ( isset($_REQUEST['subject']) ) $fields['Subject'] = esc_attr($_REQUEST['subject']);
			if ( isset($_REQUEST['00N500000027DPN']) ) $fields['Account Number'] = esc_attr($_REQUEST['00N500000027DPN']);
			if ( isset($_REQUEST['description']) ) $fields['Description'] = wp_kses($_REQUEST['description'], array());
			if ( isset($_REQUEST['00N50000001r355']) ) $fields['DQ Product'] = esc_attr($_REQUEST['00N50000001r355']);
			if ( isset($_REQUEST['dqproductline']) ) $fields['Product Line Inquiry'] = esc_attr($_REQUEST['dqproductline']);
			
			$hd = 'From: '. $fields['Name'] .($fields['Email'] != '' ? ' <'. $fields['Email'] .'>' : '') . "\r\n";
			
			foreach ( $fields as $k => $v ) {
				$msg .= $k .": ". $v ."<br />";
			}
			
			wp_mail($mailto, $sub, $msg, $hd);
			
			// store form in progo_crm db table
			global $wpdb;
			$rows_affected = $wpdb->insert($wpdb->prefix . "dqcrm", array(
				'id' => '',
				'time' => current_time('mysql'),
				'sentto' => $mailto,
				'name' => isset($fields['Name']) ? $fields['Name'] : '',
				'company' => isset($fields['Company']) ? $fields['Company'] : '',
				'email' => isset($fields['Email']) ? $fields['Email'] : '',
				'phone' => isset($fields['Phone']) ? $fields['Phone'] : '',
				'street' => isset($fields['Address']) ? $fields['Address'] : '',
				'city' => isset($fields['City']) ? $fields['City'] : '',
				'state' => isset($fields['State']) ? $fields['State'] : '',
				'zip' => isset($fields['Zip']) ? $fields['Zip'] : '',
				'lead_source' => isset($fields['Lead Source']) ? $fields['Lead Source'] : '',
				'industry' => isset($fields['Industry']) ? $fields['Industry'] : '',
				'description' => isset($fields['Description']) ? $fields['Description'] : '',
				'subject' => isset($fields['Subject']) ? $fields['Subject'] : '',
				'accountnumber' => isset($fields['Account Number']) ? $fields['Account Number'] : '',
				'product' => isset($fields['DQ Product']) ? $fields['DQ Product'] : '',
				'inquiry' => isset($fields['Product Line Inquiry']) ? $fields['Product Line Inquiry'] : ''
			));
		}
		
		$goto = $_REQUEST['retURL'];
		header('Location: '. $goto);
		die;
	}
}
endif;

add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));

function dq_admin_init() {
	// hack to check the db creation for CRM ?
	global $wpdb;

	$table_name = $wpdb->prefix ."dqcrm";
	if ( $wpdb->get_var( "show tables like '$table_name'" ) != $table_name ) {
		$sql = "CREATE TABLE $table_name (
			id mediumint(9) UNSIGNED NOT NULL AUTO_INCREMENT,
			time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			sentto tinytext NOT NULL,
			name tinytext NOT NULL,
			company tinytext NOT NULL,
			email tinytext NOT NULL,
			phone tinytext NOT NULL,
			street tinytext NOT NULL,
			city tinytext NOT NULL,
			state tinytext NOT NULL,
			zip tinytext NOT NULL,
			lead_source tinytext NOT NULL,
			industry tinytext NOT NULL,
			description text NOT NULL,
			subject tinytext NOT NULL,
			accountnumber tinytext NOT NULL,
			product tinytext NOT NULL,
			inquiry tinytext NOT NULL,
			UNIQUE KEY id (id)
		);";
	
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
	}
}
