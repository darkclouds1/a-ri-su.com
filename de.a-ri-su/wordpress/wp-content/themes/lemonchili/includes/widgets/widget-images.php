<?php
/*
Plugin Name: Images Widget
Plugin URI: http://www.red-sun-design.com
Description: Display your latest images
Version: 1.0
Author: Gerda Gimpl
Author URI: http://www.red-sun-design.com
*/

class gg_Images_Widget extends WP_Widget {

	/*--------------------------------------------------*/
	/* CONSTRUCT THE WIDGET
	/*--------------------------------------------------*/

	function gg_Images_Widget() {
  
	/* Widget name and description */
	$widget_opts = array (
		'classname' => 'gg_images_widget', 
		'description' => __('Display your latest images', 'gxg_textdomain')
	);	

	$this->WP_Widget('gg-images-widget', __('LEMONCHILI - Images', 'gxg_textdomain'), $widget_opts);
		
	}


	/*--------------------------------------------------*/
	/* DISPLAY THE WIDGET
	/*--------------------------------------------------*/	
	/* outputs the content of the widget
	 * @args --> The array of form elements*/	
	function widget($args, $instance) {	
		extract($args, EXTR_SKIP);
		
		global
		$icon;
		
		$icon = $instance['icon'];
                $title = apply_filters('widget_title', $instance['title'] );
		$number = $instance['number'];

		/* before widget */
		echo $before_widget;

		/* display title */
		if ( $title && $icon )
                        echo $before_title . '<i class="fa ' . $icon . ' "></i>' . $title . $after_title;
                elseif ( $title )
                        echo $before_title . $title . $after_title;
   
		/* display the widget */
		?>
						
		<div <?php post_class(); ?> id="images-widget-<?php the_ID(); ?>">
                        
                        <div class="gallery-widget">
                        
                        <ul>
                        <?php  
                                global $post;
                                        
                                $args = array(
                                        'order' => 'DESC',
                                        'post_type' => 'gallery',
                                        'posts_per_page' => 1 );
                                        
                                $loop = new WP_Query( $args );
                                        
                                while ( $loop->have_posts() ) : $loop->the_post();
     
                                        $images = rwmb_meta( 'gxg_gallery_images', 'type=image&size=square2', false );
                                        $i = 0;
                                        foreach ( $images as $image )  {
                                                if ($i++ < $number) {
                                                echo "<li class='prettyimage-wrap'><a class='pretty_image' title='' data-rel='prettyPhoto[pp_gallery]' href='{$image['url']}'><span class='image-rollover'><i class='gallery-resize-icon fa fa-expand'></i></span><img src='{$image['url']}' alt='' /></a></li>";
                                                }
                                        }   
            	
                                endwhile; wp_reset_query(); ?>
                
                        </ul>
                        </div><!-- .gallery-widget --> 
                        </div><!-- .post-? --> 
		
                <?php
		
		/* after widget */
		echo $after_widget;		
	}

	/*--------------------------------------------------*/
	/* UPDATE THE WIDGET
	/*--------------------------------------------------*/
	function update($new_instance, $old_instance) {		
		$instance = $old_instance;
 	
    	$instance['icon'] = strip_tags( $new_instance['icon'] );
        $instance['title'] = strip_tags( $new_instance['title'] );
    	$instance['number'] = strip_tags( $new_instance['number']);
    	
	return $instance;		
	} 
	
	
	/*--------------------------------------------------*/
	/* WIDGET ADMIN FORM
	/*--------------------------------------------------*/
	/* @instance	The array of keys and values for the widget. */
	function form($instance) {
	
		$instance = wp_parse_args(
			(array)$instance,
			array(
				'icon' => 'fa-camera-retro',
                                'title' => 'Latest Images',
				'number' => 4
			)
		);
		
	
	// Display the admin form
	?>
        <p>
		<label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e('Icon (choose from <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">here</a>) </br> Example: <b>fa-camera-retro</b> ', 'gxg_textdomain') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" value="<?php echo $instance['icon']; ?>" />
	</p>	        
        <p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'gxg_textdomain') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>
		
	<p>
		<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Posts Number:', 'gxg_textdomain') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" />
	</p>
	<?php		
		
	} // end form

	
} // end class
add_action('widgets_init', create_function('', 'register_widget("gg_Images_Widget");'));
?>