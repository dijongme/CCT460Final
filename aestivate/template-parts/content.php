<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aestivate
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php aestivate_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content <?php if(is_home( ) || is_author( )) print('entry-page') ?>">
		<?php
			//Displays featured image if its set
			if(has_post_thumbnail( )) :
				the_post_thumbnail("banner");
			endif;

			//Prints excerpt only if its on the main blog page or author page
			if(is_home( ) || is_author( ))
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

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aestivate' ),
					'after'  => '</div>',
				) );
			}
		?>
	</div><!-- .entry-content -->

	<?php
		//Prevents sidebar from being displayed if its the main blog page or author page
		if(!is_home( ) && !is_author( ))
			get_sidebar();
	?>

	<?php
		//Prevents footer from being displayed if its the main blog page or author page
		if(!is_home( ) && !is_author( ))
		{
	?>
			<footer class="entry-footer">
				<?php aestivate_entry_footer(); ?>
			</footer><!-- .entry-footer -->
	<?php
		}
	?>
</article><!-- #post-## -->



