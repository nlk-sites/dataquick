<?php
/**
 * Template of for News&Events single articles
 *
 * @package DQ
 * @subpackage DQ
 * @since DQ 1.0
 */
?>
<div id="content">
    <div id="top" class="typeface-js">
        <div class="h1">Company News</div>
        <div class="h2">Get the Latest Company Developments</div>
    </div>
    <div class="main">
    <?php get_template_part( 'loop', 'single' ); ?>
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