<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package DQ
 * @subpackage DQ
 * @since DQ 1.0
 */

get_header(); ?>
<div id="fx">
<div id="content">
    <div id="top" class="typeface-js">
        <div class="h1"><?php single_cat_title(); ?></div>
        <div class="h2"><?php echo category_description(); ?></div>
    </div>
    <?php /*
    <pre style="display:none">
    <?php global $wp_query; print_r($wp_query); ?>
    </pre>
	*/ ?>
    <div class="main">
    <ul class="nob">
    <?php get_template_part( 'loop', 'category' ); ?>
    </ul>
    </div>
    <div id="rt">
        <div id="arc">
            <h3><?php if(in_category('companynews')) echo 'Company News'; else echo 'Events Archive'; ?></h3>
            <div class="m">
            <ul>
            <?php wp_get_archives('cat=5&show_post_count=true'); ?>
            </ul>
            </div>
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
