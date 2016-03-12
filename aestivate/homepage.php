<?php
/**
 * Template Name: Home Page
 */

 get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<div class="content-section">
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		
			</div>
		<br>
		<!--new section-->
<div class="news-section">
<?php 
	//to retrieve recent posts
	$paged = (get_query_var("page")) ? get_query_var("page") : 1;
	$wp_query = new WP_Query(array("posts_per_page" => 3, "paged" => $paged));
	
	if ($wp_query->have_posts()) :
		while($wp_query->have_posts()) :
			//iterates the post index
			$wp_query->the_post();
?>

	<div class="recent-post"> 
		<?php the_post_thumbnail("medium") ?>
		<h3><a href="<?php the_permalink()?>"><?php the_title() ?> </a></h3>
		<p> <?php the_excerpt() ?> </p>
	</div>
	
	<?php
		endwhile;
	?>
	<br>
	<div class="prev-next-links">
	<?php 
		previous_posts_link("<i class='fa fa-caret-left fa-lg'></i>");
		next_posts_link("<i class='fa fa-caret-right fa-lg'></i>", $wp_query->max-num_pages);
	?>
	</div>
	<?php
		endif;
	?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
