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
		

		print($args["before_widget"]);

		//Prints title if not empty
		if(!empty($instance["title"]))
		{
			print($args["before_title"] . apply_filters("widget_title", $instance["title"]) . $args["after_title"]);
		}
?>
		<ul>
<?php
		//Retrieves recent reviews
		$wp_query = new WP_Query(array("post_type" => "reviews", "posts_per_page" => ((!empty($instance["Number of Posts to Display"])) ? $instance["Number of Posts to Display"] : 3), "order" => ((!empty($instance["order"])) ? $instance["order"] : "DESC")));

		//WP loop to display recent reviews
		if($wp_query->have_posts( ))
		{
			while($wp_query->have_posts( ))
			{
				//Iterates the post index
				$wp_query->the_post( );
?>
				
					<?php the_post_thumbnail("thumbnail") ?><br>
					<a href="<?php the_permalink( ) ?>"><?php the_title( ) ?></a><br>
				
<?php
			}
		}
?>
		</ul>
<?php
		print($args["after_widget"]);
	}
	
	public function form($instance)
	{ 
		//Variables
		$title 	= !empty($instance["title"]) ? $instance["title"] : __("Recent Reviews");
		$number_of_posts_to_display = !empty($instance["Number of Posts to Display"]) ? $instance["Number of Posts to Display"] : __("3");
		$order = !empty($instance["order"]) ? $instance["order"] : __("DESC");
	
	?>
		<p>
			<label for="<?php print($this->get_field_id("title"))?>"> <?php _e("title") ?>:</label>
			<input id="<?php print($this->get_field_id("title"))?>" class="widefat" type="text" name="<?php print($this->get_field_name("title"))?>" value="<?php print(esc_attr($title))?>"/>
		</p>
		<p>		
			<label for="<?php print($this->get_field_id("Number of Posts to Display"))?>"> <?php _e("Number of Posts to Display") ?>:</label>
			<input id="<?php print($this->get_field_id("Number of Posts to Display"))?>" class="widefat" type="text" name="<?php print($this->get_field_name("Number of Posts to Display"))?>" value="<?php print(esc_attr($number_of_posts_to_display))?>"/>
		</p>
		<p>
			<label for="<?php print($this->get_field_id("order"))?>"> <?php _e("order") ?>:</label>
			<select id="<?php print($this->get_field_id("order"))?>" name="<?php print($this->get_field_name("order"))?>">
				<option value="DESC" <?php (($order == "DESC") ? print("selected= 'selected'") : print("")) ?> >Descending</option>
				<option value="ASC" <?php (($order == "ASC") ? print("selected= 'selected'") : print("")) ?> >Ascending</option>
			</select>
		</p>
	
	<?php	
	}
	
	//updates the widget form
		public function update($new_instance, $old_instance)
	{
		//Variables
		$instance = array();

		//Retrieves new saved values
		$instance["title"]     = (!empty($new_instance["title"])) ? strip_tags($new_instance["title"]) : "Recent Reviews";
		$instance["Number of Posts to Display"] = (!empty($new_instance["Number of Posts to Display"])) ? strip_tags($new_instance["Number of Posts to Display"]) : 3;
		$instance["order"]     = (!empty($new_instance["order"])) ? strip_tags($new_instance["order"]) : "DESC";

		//Returns instance
		return $instance;
	}



}

add_action("widgets_init", function( )
{
	register_widget("Display_Reviews_Widget");
});


