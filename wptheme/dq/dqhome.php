<?php
/**
 * Template Name: Homepage
 *
 * @package DQ
 * @subpackage DQ
 * @since DQ 1.0
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
<h3 class="b h1 real"><a href="<?php bloginfo('url'); ?>/companynews/"><strong class="typeface-js">In the News </strong><span class="txt">Get the latest developments on our company's new products and services.</span></a></h3>

<h3 class="b h1 blue cyc">
<?php /* cycling links ... */ ?>
<a href="http://www.dataquick.com/products/credit/" class="on"><strong class="typeface-js">Credit Solutions</strong><span class="txt">Make the most out of credit reports with specific, updated information.</span></a>
<a href="http://www.dataquick.com/products/dataanalytics/" style="display:none"><strong class="typeface-js">Data and Analytics</strong><span class="txt">Leverage our robust national property database and analytic expertise.</span></a>
<a href="http://www.dataquick.com/products/decisioning/" style="display:none"><strong class="typeface-js">Decisioning</strong><span class="txt">MindBox&reg; provides technology and solutions that streamline decisioning at any point in the lending industry.</span></a>
<a href="http://www.dataquick.com/products/flood/" style="display:none"><strong class="typeface-js">Flood</strong><span class="txt">Receive flood zone determinations within seconds using robust technology.</span></a>
<a href="http://www.dataquick.com/products/licensedappraisals/" style="display:none"><strong class="typeface-js">Licensed Appraisals</strong><span class="txt">Spend less of your time and effort on appraisals by using our high quality and compliant appraisal management services.</span></a>
<a href="http://www.dataquick.com/products/research/" style="display:none"><strong class="typeface-js">Property Research &amp; Marketing</strong><span class="txt">Leverage powerful property research tools and create targeted marketing lists.</span></a>
<a href="http://www.dataquick.com/products/settlementsvcs/" style="display:none"><strong class="typeface-js">Settlement Services</strong><span class="txt"> Close loans efficiently, improve the borrower experience and save time and money.</span></a>
<a href="http://www.dataquick.com/products/valuation/" style="display:none"><strong class="typeface-js">Valuation and Validation</strong><span class="txt">Obtain more accurate and reliable valuations in significantly less time.</span></a>
<a href="http://www.dataquick.com/products/database/" style="display:none"><strong class="typeface-js">Database</strong><span class="txt">A comprehensive resource with proven solutions that drive business-critical applications.</span></a>

</h3>
<?php get_sidebar('get'); ?>
</div>
<div class="b test">
<a href="testimonials/" class="hdr"><span class="typeface-js">Customer Testimonial</span><span class="ar"></span></a>
<?php dynamic_sidebar('hometest'); ?>
<a href="testimonials/" class="more">More Testimonials &raquo;</a>
</div>
<div class="b dqn">
<a href="<?php echo get_permalink(2965); ?>" class="hdr"><span class="typeface-js">Research Highlight</span><span class="ar"></span></a>
<?php dynamic_sidebar('researchhighlight'); ?>
<a href="<?php echo get_permalink(2965); ?>" class="more">More in Research Highlight &raquo;</a>
</div>
<div class="b dqb">
<a href="ratecalculators/" class="hdr"><span class="typeface-js">Rate Calculator</span><span class="ar"></span></a>
<div class="inside">
<h3><a href="ratecalculators/">Premium Rate Calculator</a></h3>
	<p>DataQuick Title offers fast and easy access to a rate calculator. Get quick rates with just a few clicks directly from the DataQuick Title website.<br />
	<a href="ratecalculators/">READ MORE</a></p>
</div>
<a href="blog/" class="more">More in DQ Blog &raquo;</a>
</div>
<?php get_footer(); ?>