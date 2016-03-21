<?php

/**
 * CLASS: DISPLAY REVIEWS WIDGET
 */
class Display_Reviews_Widget extends WP_Widget
{
	/**
	 * CONSTRUCTOR
	 * Sets initial settings for the widget.
	 */
	public function __construct( )
	{
		parent::__construct("display-reviews_widget", __("Recent Reviews"), array
		(
			"description" => __("A listing of recent reviews.")
		));
	}

	/**
	 * WIDGET
	 * Creates the widget front end.
	 */
	public function widget($args, $instance)
	{
		//Variables
		$title = "Recent Reviews";

		print($args["before_widget"]);

		//Prints title if not empty
		if(!empty($title))
		{
			print($args["before_title"] . $title . $args["after_title"]);
		}
?>
		<ul>
<?php
		//Retrieves recent reviews
		$wp_query = new WP_Query(array("post_type" => "reviews", "posts_per_page" => 3));

		//WP loop to display recent reviews
		if($wp_query->have_posts( ))
		{
			while($wp_query->have_posts( ))
			{
				//Iterates the post index
				$wp_query->the_post( );
?>
				<li>
					<a href="<?php the_permalink( ) ?>"><?php the_title( ) ?></a>
				</li>
<?php
			}
		}
?>
		</ul>
<?php
		print($args["after_widget"]);
	}
}

add_action("widgets_init", function( )
{
	register_widget("Display_Reviews_Widget");
});


