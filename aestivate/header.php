<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aestivate
 */

?>
<!DOCTYPE html>
<html <?php language_attributes( ); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php
	wp_head( ); ?>
</head>

<body <?php body_class( ); ?>>
<!-- PAGE -->
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'aestivate' ); ?></a>
	<!-- BOX -->
	<div class="box top-green-border">
		<!-- MASTHEAD -->
		<header id="masthead" class="site-header" role="banner">
			<!-- SEARCH -->
			<div id="search-widget">
				<i class="fa fa-search"></i>
				<?php dynamic_sidebar( 'sidebar-search' ); ?>
			</div>
			<!-- //SEARCH -->
			<br>
			<!-- SITE-BRANDING -->
			<div class="site-branding">
				<img id="logo" src="<?php print(wp_get_attachment_url(get_theme_mod("logo_setting"))) ?>" />

				<?php
				if(is_front_page( ) && is_home( )) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif;

				$description = get_bloginfo( 'description', 'display' );
				if($description || is_customize_preview( )) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
			</div>
			<!-- //SITE-BRANDING -->
			<br>
			<!-- SITE-NAVIGATION -->
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><img src = "<?php print(get_template_directory_uri()) ?>/img/hamburgericon.png"></button>
                <br clear="both">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav>
			<!-- //SITE-NAVIGATION -->
		</header>
		<!-- //MASTHEAD -->
	
		<!-- CONTENT -->
		<div id="content" class="site-content">

