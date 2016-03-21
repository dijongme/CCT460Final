<?php

// aestivate reviews shortcode




add_shortcode( 'aestivate_shortcode', 'aestivate_shortcode' );
function aestivate_shortcode( $atts ) {
    ob_start();
    $query = new WP_Query( array(
        'post_type' => 'reviews',

        'posts_per_page' => 5,
        'order' => 'ASC',
        'orderby' => 'title',
    ) );
    if ( $query->have_posts() ) { ?>
        <ul class="reviews-listing">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </ul>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
	
}

?>