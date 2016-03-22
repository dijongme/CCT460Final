<?php

/**
 * Plugin Name: Aestivate Reviews
 * Description: This is a plugin that will register a new review custom post type, widget and shortcode.
 * Author: Zhuoqiao Li, Tianyi Liu, Megan Dijong  
 * Version: 1.0
 * Author URI: http://phoenix.sheridanc.on.ca/~ccit3474/
 */
 

 //Includes widget class
 require_once("inc/widget-display_reviews.php");
 
 /**
  * Registers custom post type
  */
function aestivate_register_cpt( )
{
	//Sets labels for custom post type
	$labels = array
	(
		"name"               => __("Reviews"),
		"singular_name"      => __("Review"),
		"add_new"            => __("Add New"),
		"add_new_item"       => __("Add New Review"),
		"edit_item"          => __("Edit Review"),
		"new_item"           => __("New Review"),
		"all_items"          => __("All Reviews"),
		"view_item"          => __("View Review"),
		"search_items"       => __("Search Review"),
		"not_found"          => __("No reviews found"),
		"not_found_in_trash" => __("No reviews found in the Trash"),
		"parent_item_colon"  => "",
		"menu_name"          => "Reviews"
	);

	//Sets arguments for custom post type
 	$args = array
 	(
 		"labels"        => $labels,
 		"description"   => "Custom post type reviews",
 		"public"        => true,
 		"menu_position" => 5,
 		"menu_icon"     => "dashicons-format-status",
 		"supports"      => array("title", "editor", "thumbnail", "excerpt", "comments"),
 		"has_archive"   => true
	);

	//Registers new post type called "reviews"
	register_post_type("reviews", $args);
}

add_action("init", "aestivate_register_cpt");



function aestivate_display_review($atts, $content = NULL)
{
	//Variables
	$output = "";

	//Extracts attributes for shortcode
	extract
	(
		shortcode_atts(array
		(
			"slug" => NULL
		), $atts)
	);

	//Retrieves review post based on slug name given as long as its not empty
	if(!empty($slug))
	{
		//Retrieves recent reviews
		$wp_query = new WP_Query(array("post_type" => "reviews", "name" => "$slug"));

		//WP loop to display recent reviews
		if($wp_query->have_posts( ))
		{
			while($wp_query->have_posts( ))
			{
				//Iterates the post index
				$wp_query->the_post( );

				//Retrieves the featured image, title and content to display
				$output .= get_the_post_thumbnail( ) .
						   "<h2>" . get_the_title( ) . "</h2>" .
						   get_the_content( );
			}
		}

		return "<div class='review'>" . $output . "</div>";
	}
}
add_shortcode("display_review", "aestivate_display_review");

function aestivate_setup( )
{
	wp_enqueue_style("aestivate-style2", plugins_url("/CSS/style.css", __FILE__));
}
add_action("wp_enqueue_scripts", "aestivate_setup");









