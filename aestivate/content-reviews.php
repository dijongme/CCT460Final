<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package my_theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if(is_single( ))
			{
				the_title('<h1 class="entry-title">', '</h1>');
			}
			else
			{
				the_title('<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>');
			}
		?>
	</header><!-- .entry-header -->

	<div class="entry-content <?php if(!is_single("reviews")) print('entry-page') ?>">
		<?php
			//Displays featured image if its set
			if(has_post_thumbnail( )) :
				the_post_thumbnail("banner");
			endif;

			//Prints excerpt only if its on the main reviews listing page
			if(!is_single("reviews"))
			{
		?>
				<?php the_excerpt( ) ?>
		<?php
			}
			else
			{
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'my-theme' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			}
		?>
	</div><!-- .entry-content -->

	<?php
		//Only displays the sidebar on single review pages
		if(is_single("reviews"))
			get_sidebar();
	?>

	<?php
		//Only displays the footer if its on single review pages
		if(is_single("reviews"))
		{
	?>
			<footer class="entry-footer">
				<?php my_theme_entry_footer(); ?>
			</footer><!-- .entry-footer -->
	<?php
		}
	?>
</article><!-- #post-## -->



