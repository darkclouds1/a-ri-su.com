<?php

global $k_options;

// Widget Settings

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'All Pages',
		'before_widget' => '<div id="%1$s" class="small_box widget %2$s">', 
	'after_widget' => '</div>', 
	'before_title' => '<h3 class="widgettitle">', 
	'after_title' => '</h3>', 
	));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Sidebar Blog',
		'before_widget' => '<div id="%1$s" class="small_box widget %2$s">', 
	'after_widget' => '</div>', 
	'before_title' => '<h3 class="widgettitle">', 
	'after_title' => '</h3>', 
	));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Frontpage Box1',
		'before_widget' => '<div id="%1$s" class="box_small box box1 widget %2$s">', 
	'after_widget' => '</div>', 
	'before_title' => '<h3 class="widgettitle">', 
	'after_title' => '</h3>', 
	));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Frontpage Box2',
		'before_widget' => '<div id="%1$s" class="box_small box box2 widget %2$s">', 
	'after_widget' => '</div>', 
	'before_title' => '<h3 class="widgettitle">', 
	'after_title' => '</h3>', 
	));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Frontpage Box3',
		'before_widget' => '<div id="%1$s" class="box_small box box3 widget %2$s">', 
	'after_widget' => '</div>', 
	'before_title' => '<h3 class="widgettitle">', 
	'after_title' => '</h3>', 
	));
	
	
	
	if ( function_exists('register_sidebar') )
	{	
		$dynamic_widgets = explode(',',$k_options['general']['multi_widget_final']);
		foreach ($dynamic_widgets as $page)
		{	
			if($page != "")
			register_sidebar(array(
			'name' => get_the_title($page),
			'before_widget' => '<div id="%1$s" class="small_box widget %2$s">', 
			'after_widget' => '</div>', 
			'before_title' => '<h3 class="widgettitle">', 
			'after_title' => '</h3>', 
			));
		}
	}
