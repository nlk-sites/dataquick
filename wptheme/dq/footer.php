<?php
/**
 * @package DQ
 * @subpackage DQ
 * @since DQ 1.0
 */
?>
	</div>
</div>
<div id="frap">
	<div id="ftr"><div class="br">
        <div class="mo typeface-js">More Ways to Search DataQuick :</div>
        <ul id="fnav">
            <li class="on ind"><a href="<?php echo get_permalink(21); ?>" class="first typeface-js">Industry Solutions</a>
            <?php wp_nav_menu(array('container' => '','theme_location'=>'industry','link_after'=>'<span class="ar"> &raquo;</span>')); ?>
            </li>
            <li class="prod"><a href="<?php echo get_permalink(19); ?>" class="first typeface-js">Products</a>
            <?php wp_nav_menu(array('container' => '','theme_location'=>'products','link_after'=>'<span class="ar"> &raquo;</span>')); ?>
            </li>
            <li class="rh"><a href="<?php echo get_permalink(2965); ?>" class="first typeface-js">Research</a>
            <?php wp_nav_menu(array('container' => '','theme_location'=>'research','link_after'=>'<span class="ar"> &raquo;</span>')); ?>
            </li>
        </ul>
        <?php get_search_form(); ?>
        </div>
        <div class="num typeface-js"><div><em>Contact Us</em>1-866-774-3282</div><div><em></em></div></div>
        <div class="so">Follow Us Online
        <ul>
        <li><a href="http://twitter.com/DataQuick" target="_blank" class="t" title="Twitter.com/DataQuick">Twitter</a></li>
        <li><a href="http://www.facebook.com/DataQuick" target="_blank" class="f" title="Facebook.com/DataQuick">Facebook</a></li>
        <li><a href="http://www.linkedin.com/company/dataquick" target="_blank" class="l" title="LinkedIn">LinkedIn</a></li>
        <li><a href="http://activerain.com/groups/DataQuick" target="_blank" class="a" title="ActiveRain">ActiveRain</a></li>
        <?php /*<li><a href="<?php bloginfo('rss2_url'); ?>" class="r" title="Subscribe to RSS">RSS</a></li>*/ ?>
        </ul>
        </div>
        <div class="e"><span class="l"><a href="<?php bloginfo('url'); ?>">Home</a> &nbsp;|&nbsp; <a href="<?php echo get_permalink(139); ?>">Sitemap</a> &nbsp;|&nbsp; <a href="<?php echo get_permalink(131); ?>">Careers</a> &nbsp;|&nbsp; <a href="<?php echo get_permalink(135); ?>">Consumer Privacy</a> &nbsp;|&nbsp; <a href="<?php echo get_permalink(141); ?>">Privacy</a> &nbsp;|&nbsp; <a href="<?php echo get_permalink(144); ?>">Terms of Use</a> &nbsp;|&nbsp; <a href="<?php echo get_permalink(137); ?>">Contact Us</a></span><span class="r">Copyright &copy; <?php echo date('Y'); ?> <a href="<?php bloginfo('url'); ?>">DataQuick</a> &bull; All Rights Reserved</span></div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
