<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aestivate
 */

?>

	</div>	
    <!-- //CONTENT -->
    <!-- //BOX -->
	<!-- COLOPHON -->
	<footer id="colophon" class="site-footer" role="contentinfo">
    <!-- BOX -->
	<div class="box">
		<!-- SITE-INFO -->
        <div class="site-info">
        <div class="site-title">
					<?php bloginfo( 'name' ); ?>
				</div>

				<nav id="footer-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_id' => 'footer-menu' ) ); ?>
				</nav>        
		
        		<div class="copyright">
					&copy; <?php print(date("Y") . " " . get_theme_mod("copyright_setting")) ?>
				</div>
			</div>
			<!-- //SITE-INFO -->
        	</div>
			<!-- //BOX -->
		</footer>
		<!-- //COLOPHON -->
	</div>
	<!-- //PAGE -->
        
<?php wp_footer(); ?>

</body>
</html>
