<?php
/**
 * Template Name: Home Page
 */

 get_header();
?>
	<!-- PRIMARY -->
	<div id="primary" class="content-area">
    	<!-- MAIN -->
		<main id="main" class="site-main" role="main">
		<!-- CONTENT SECTION -->
		<div class="content-section">
		<?php
			if(have_posts( )) :
				//Starts the loop
				while(have_posts( )) :
					//Iterates the post index
					the_post( );

					//Prints out the content
					the_content( );
				endwhile;

				the_posts_navigation( );
			else :
				get_template_part('template-parts/content', 'none');
			endif;
			?>
			</div>
			<!--// CONTENT SECTION -->
			<br>
			<!-- NEWS SECTION -->
			<div class="news-section">
			<?php 
			//Retrieves recent posts
		$paged = (get_query_var("page")) ? get_query_var("page") : 1;
		$wp_query = new WP_Query(array("posts_per_page" => 3, "paged" => $paged));
	
	//WP loop to display recent posts
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
		//Adds pagination links to enable users to navigate between posts
		previous_posts_link("<i class='fa fa-caret-left fa-lg'></i>");
		next_posts_link("<i class='fa fa-caret-right fa-lg'></i>", $wp_query->max-num_pages);
	?>
	</div>
	<?php
		endif;
	?>
	</div>
	<!--//NEWS SECTION -->
	</main>
	<!-- //MAIN -->
</div>
<!-- //PRIMARY -->
<br>
<?php
get_footer( );