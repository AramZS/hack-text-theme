<?php function_exists( 'apture_script' ) && apture_script(); ?>
<?php
/**
 * @package WordPress
 * @subpackage Magazeen_Theme
 */
?>

	<div id="footer">
	
		<div class="container footer-divider clearfix">
		
			<div class="categories">
				
				<h4>Categories</h4>
				
				<ul class="footer-cat clearfix">
					<?php
						wp_list_categories( 'title_li=&depth=1' );
					?>
				</ul><!-- End footer-cats -->
				
			</div><!-- End categories -->
			
			<div class="about">
			
				<h4>About this Blog</h4>
				
				<p class="about-text">
					<?php echo get_settings( 'mag_about_blog' ); ?>
				</p>
				
				<p class="copyright">
					&copy; 2011 Copyright <?php bloginfo( 'name' ); ?>
				</p>
				
			</div><!-- End about -->
		
		</div><!-- End container -->
	
	</div><!-- End footer -->
	
	<div id="link-back">
	
		<div class="container clearfix">
		
			<div class="donators">
			
				<a href="http://forum.smashingmagazine.com" class="smashing" title="Brought To You By: www.SmashingMagazine.com">Brought to you By: www.SmashingMagazine.com</a>
				<a href="http://www.wefunction.com" class="function" title="In Partner With: www.WeFunction.com">In Partner with: www.WeFunction.com</a>
								<a rel="license" class="cc" title="Creative Commons License" href="http://creativecommons.org/licenses/by-sa/3.0/us/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-sa/3.0/us/88x31.png" /></a>
								
			
			</div><!-- End donators -->
			
			<a href="<?php bloginfo( 'rss2_url' ); ?>" class="rss" title="Subscribe to <?php bloginfo( 'name' ); ?> RSS">Subscribe</a>
		
		</div>
	
	</div><!-- End link-back -->
	
	<?php wp_footer(); ?>

<!-- Site Meter -->
<script defer type="text/javascript" src="http://s48.sitemeter.com/js/counter.js?site=s48ZSRWV">
</script>
<noscript>
<a href="http://s48.sitemeter.com/stats.asp?site=s48ZSRWV" target="_top">
<img src="http://s48.sitemeter.com/meter.asp?site=s48ZSRWV" alt="Site Meter" border="0"/></a>
</noscript>
<!-- Copyright (c)2009 Site Meter -->
	
</body>
</html>
