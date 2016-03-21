<?php
/**
 * Plugin Name: Aestivate Reviews
 * Description: This is a plugin that will register a new review custom post type, widget and shortcode.
 * Author: Zhuoqiao Li, Tianyi Liu, Megen Dijong
 * Version: 1.0
 */
 
 //Includes widget class
 require_once ("inc/widget-display_reviews.php");
 require_once ("inc/aestivate_shortcode.php");
 
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

	register_post_type("reviews", $args);
}

add_action("init", "aestivate_register_cpt");


 
 ?>