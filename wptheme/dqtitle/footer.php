<?php
/**
 * @package DQTitle
 * @subpackage DQTitle
 * @since DQTitle 1.0
 */
?>
	</div>
</div>
<div id="frap">
	<div id="ftr"><div class="br">
    	<?php wp_nav_menu(array('container' => '','theme_location'=>'bottombar','menu_id'=>'fnav')); ?>
        <?php /*get_search_form();*/ ?>
        <form action="http://www.dataquick.com/" id="searchform" method="get" role="search">
        <input type="text" id="s" name="s" value="">
        <input type="submit" value="Search" id="searchsubmit">
        </form>
        </div>
        <div class="e"><div class="l"><a href="<?php bloginfo('url'); ?>">Home</a> &nbsp;|&nbsp; <a href="http://www.dataquick.com/about/careers/" target="_blank">Careers</a> &nbsp;|&nbsp; <a href="http://www.dataquick.com/about/consumer-privacy/" target="_blank">Consumer Privacy</a> &nbsp;|&nbsp; <a href="http://www.dataquick.com/about/privacy/" target="_blank">Privacy</a> &nbsp;|&nbsp; <a href="http://www.dataquick.com/about/terms/" target="_blank">Terms of Use</a><br />Copyright &copy; <?php echo date('Y'); ?> <a href="http://www.dataquick.com" target="_blank">DataQuick</a>. All Rights Reserved</div>
        <div class="r so">
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
<?php wp_footer(); ?>
</body>
</html>
