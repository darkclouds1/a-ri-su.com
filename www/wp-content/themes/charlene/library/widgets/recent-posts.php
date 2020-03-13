<?php
/**
 * Charlene Recent Posts Widget
 *
 * Displays recent post formatted like the
 * theme demo. @link http://papertreedesign.com/themes/
 *
 * Credit Justin Tadlock @link http://justintadlock.com/archives/2009/05/26/the-complete-guide-to-creating-widgets-in-wordpress-28
 */

/**
 * Loads custom widget.
 */
add_action( 'widgets_init', 'charlene_load_widgets' );

/**
 * Registers widget
 *
 */
function charlene_load_widgets() {
	register_widget( 'Charlene_Widget_Recent' );
}

/**
 * Widget Class
 */
class Charlene_Widget_Recent extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function Charlene_Widget_Recent() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'charlene_recent', 'description' => __('An advanced widget to control Recent Post similar to the Demo', 'charlene') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'charlene-recent' );

		/* Create the widget. */
		$this->WP_Widget( 'charlene-recent', __('Charlene Theme Recent', 'charlene'), $widget_ops, $control_ops );
	}

	/**
	 * Display the widget.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recently Written') : $instance['title']);
          if ( !$number = (int) $instance['number'] )
             $number = 10;
          else if ( $number < 1 )
             $number = 1;
          else if ( $number > 10 )
             $number = 10;
		
		$cr = new WP_Query(array('showposts' => $number, 'offset' => $number, 'caller_get_posts' => 1)); // offsets same number of posts
		if ($cr->have_posts()) :
?>
		<!-- Before widget (defined by themes). -->
		<?php echo $before_widget . "\r";
		    
        	if ( $title ) echo "\n\t\t\t" . $before_title . $title . $after_title; 
            
			echo "\r\n\t\t\t" . '<ul class="xoxo recent-posts">';
		
    		while ($cr->have_posts()) : $cr->the_post();
    	
			echo "\r\n\t\t\t\t"	. '<li class="aside"><a href="' . get_permalink() . '" rel="bookmark" title="' . get_the_title() . '"><span class="aside-title">' .  get_the_title() . '</span></a> -'; 
            echo "\n\t\t\t\t\t" . '<span class="aside-content">';
              
            $excerpt = strip_tags(get_the_excerpt());
            echo string_limit_words($excerpt,15);
                 		
			echo "\n\t\t\t\t\t" . '</span><!-- end .aside-content -->';	
			 			
	    	echo "\n\t\t\t\t" . '</li>';
	    
        endwhile;
        echo "\n\t\t\t" . '</ul>';
        ?> 
        
		<!-- * After widget (defined by theme widget.php). * -->
		<?php echo $after_widget; ?>
<?php		
		wp_reset_query();
	    endif;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = strip_tags( $new_instance['number'] );


		return $instance;
	}

	/**
	 * Displays the widget settings controls
	 */
	function form( $instance ) {
          $title = esc_attr($instance['title']);
          if ( !$number = (int) $instance['number'] )
              $number = 5;
  ?>
          <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
  
          <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:'); ?></label>
          <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /><br />
          <small><?php _e('(at most 10)'); ?></small></p>
	<?php
	}
}

?>