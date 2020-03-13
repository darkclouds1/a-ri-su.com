<?php

$presets_widgets = array (
	'sidebar-main'  => array( 'charlene-recent', 'search' ),
	'sidebar-secondary'  => array( 'categories' )
);
if ( isset( $_GET['activated'] ) ) {
	update_option( 'sidebars_widgets', $presets_widgets );
}

function is_sidebar_active( $index = 1 ) {
	$sidebars_widgets = wp_get_sidebars_widgets();

	$index = ( is_int( $index ) ) ? "sidebar-$index" : sanitize_title( $index );

	if ( isset( $sidebars_widgets[$index] ) && !empty( $sidebars_widgets[$index] ) )
		return true;
  
	return false;
}


/**
 * Register Three Widget Ready Areas
 *
 * Sidebar Main, Sidebar Secondary, After Post
 */
if ( function_exists('register_sidebars') )	{
	
   register_sidebar(array(
       'name' => 'Sidebar Main',
       'id' => 'sidebar-main',
       'before_widget' => '<li id="%1$s" class="widget %2$s">',
       'after_widget' => '</li>',
       'before_title' => '<h3 class="widgettitle">',
       'after_title' => '</h3>',
   ));

   register_sidebar(array(
       'name' => 'Sidebar Secondary',
       'id' => 'sidebar-secondary',
       'before_widget' => '<li id="%1$s" class="widget %2$s">',
       'after_widget' => '</li>',
       'before_title' => '<h3 class="widgettitle">',
       'after_title' => '</h3>',
   ));
   
   /**
    * Below post widget ready area.
    *
    * Useful for adding things like similar posts widgets.
    */
   register_sidebar(array(
       'name' => 'After Post',
       'id'   => 'after-post',
       'before_widget' => '<li id="%1$s" class="widget %2$s">',
       'after_widget' => '</li>',
       'before_title' => '<h3 class="widgettitle">',
       'after_title' => '</h3>',
   ));
}
?>