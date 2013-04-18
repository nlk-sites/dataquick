<?php
/**
 * Template Name: Direct Page
 *
 * @package DQ
 * @subpackage DQ
 * @since DQ 1.0
 */

get_header( 'direct' ); ?>
<div id="fx">
    <div id="content">
        <div id="dleft">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post();
			the_content();
		endwhile; ?>
        </div>
        <div id="dright"><div class="dtar typeface-js"><?php
$dtar = get_post_meta($post->ID, 'top_arrow', true);
if($dtar == '') $dtar = "CONTACT US\nTODAY";
echo nl2br($dtar);
		?></div>
<?php
$form = get_post_meta($post->ID, 'direct_form', true);
if ( $form == '' ) {
	$form = 'lead';
}
if ( in_array($form, array('lead', 'case'))) {
	get_sidebar('web2'. $form);
} else { // gravityform!
	echo do_shortcode($form);
}
?>
            <div class="dblk">
                <h3><span class="spacer">Contact Us</span></h3>
                <div class="inside">Call: 1 888-299-8787<br />Email: <a href="mailto:sales@dataquick.com">sales@dataquick.com</a></div>
            </div>
            <div class="dblk so">
            	<h3><span class="spacer">Follow Us Online</span></h3>
                <div class="inside">
                    <ul>
                    <li><a href="http://twitter.com/DataQuick" target="_blank" class="t" title="Twitter.com/DataQuick">Twitter</a></li>
                    <li><a href="http://www.facebook.com/DataQuick" target="_blank" class="f" title="Facebook.com/DataQuick">Facebook</a></li>
                    <li><a href="http://www.linkedin.com/company/dataquick" target="_blank" class="l" title="LinkedIn">LinkedIn</a></li>
                    <li><a href="http://activerain.com/groups/DataQuick" target="_blank" class="a" title="ActiveRain">ActiveRain</a></li>
                    <?php /*<li><a href="<?php bloginfo('rss2_url'); ?>" class="r" title="Subscribe to RSS">RSS</a></li>*/ ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer( 'direct' ); ?>
