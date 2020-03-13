<?php

/****************************************
*****************************************
** ! Be very cautious editing this file
** so that you don't break the theme.
** I recommend making a copy before you
** edit this file !  
*****************************************
****************************************/

/** SIDEBARS ******************************************************************/
if ( function_exists('register_sidebar') ) {

register_sidebar(array(
                  'name'=>'sidebar home',
                  'id' => 'home_sidebar',
                  'description' => __( 'sidebar on homepage', 'gxg_textdomain' ),
                  'before_widget' => '<div id="%1$s" class="widget %2$s box col6 boxbg">',
                  'after_widget' => '</div>',
                  'before_title' => '<h3 class="widgettitle text-center">',
                  'after_title' => '</h3>', ));

register_sidebar(array(
                  'name'=>'contact sidebar',
                  'id' => 'contact_sidebar',
                  'description' => __( 'sidebar on contact page. Will display below content.', 'gxg_textdomain' ),
                  'before_widget' => '<div id="%1$s" class="widget %2$s box col6 boxbg">',
                  'after_widget' => '</div>',
                  'before_title' => '<h3 class="widgettitle text-center">',
                  'after_title' => '</h3>', ));
}



/** MENUS *********************************************************************/

//regular menu
if (function_exists('wp_nav_menu')) {
         function register_my_menus() {
                  register_nav_menus(
                  array(
                           'main-menu' => __( 'LEMONCHILI Main Menu', 'gxg_textdomain' )
                  )
         	  );
         }
         add_action( 'init', 'register_my_menus' );
}


//responsive menu
function wp_nav_menu_select( $args = array() ) {
     
        $defaults = array(
                'theme_location' => '',
                'menu_class' => 'select-menu',
        );
         
        $args = wp_parse_args( $args, $defaults );
         
        if ( ( $menu_locations = get_nav_menu_locations() ) && isset( $menu_locations[ $args['theme_location'] ] ) ) {
                $menu = wp_get_nav_menu_object( $menu_locations[ $args['theme_location'] ] );
             
                $menu_items = wp_get_nav_menu_items( $menu->term_id );
                ?>
                        <select id="menu-<?php echo $args['theme_location'] ?>" class="<?php echo $args['menu_class'] ?>">
                                <?php foreach( (array) $menu_items as $key => $menu_item ) : ?>
                                        <option value="<?php echo $menu_item->url ?>" class="<?php echo $menu_item->classes[0] ?>"><?php echo $menu_item->title ?></option>
                                <?php endforeach; ?>
                        </select>
                        <div id="navi-icon"><i class="fa fa-bar"></i><?php _e( ' Navigation', 'gxg_textdomain' ); ?></div>
                <?php
        }
}


/** EXCERPT LENGTH AND READ MORE LINK *****************************************/
function new_excerpt_length($length) {
        return 30;
}
add_filter('excerpt_length', 'new_excerpt_length');


function new_excerpt_more($more) {
         global $post;
         return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );



/** CONTENT WIDTH *************************************************************/
if ( ! isset( $content_width ) )
        $content_width = 700;



/** ALLOW HTML IN CATEGORY AND TAXONOMY DESCRIPTIONS **************************/
remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'pre_link_description', 'wp_filter_kses' );
remove_filter( 'pre_link_notes', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );



/** THUMBNAILS ****************************************************************/
if (function_exists('add_theme_support')) {
        add_theme_support( 'post-thumbnails' );  
        set_post_thumbnail_size(470, 220, true); // default
}

if ( function_exists( 'add_image_size' ) ) { 
        add_image_size('square1', 140, 140, true); 
        add_image_size('square2', 260, 260, true);
        add_image_size('square3', 380, 380, true);        

        add_image_size('gallery', 440, 320, true); 
        add_image_size('menu', 380, 520, true);
}



/** GET RID OF DEFAULT GALLERY STYLE ******************************************/
add_filter( 'use_default_gallery_style', '__return_false' );



/** FEED LINKS ****************************************************************/
add_theme_support('automatic-feed-links');



/** INCLUDE THEME OPTIONS******************************************************/
$admin_path = get_template_directory() . '/includes/admin/';
require_once ($admin_path . 'options-framework.php');



/** INCLUDE RETINA AND THEME OPTIONS PANEL STYLES ****************************************/
$options_path = get_template_directory() . '/css/';
include_once ($options_path . 'retina.php');
include_once ($options_path . 'css_options_panel.php');

if ( of_get_option('gg_responsive') ) { 
        include_once ($options_path . 'css_options_panel_responsive.php');
}



/** INCLUDE THEME FUNCTIONS ***************************************************/
$functions_path = get_template_directory() . '/includes/functions/';
include_once ($functions_path . 'theme_functions.php');
include_once ($functions_path . 'mobile_detect.php');



/** INCLUDE WIDGETS ***********************************************************/
include('includes/widgets/widget-flickr.php');
include('includes/widgets/widget-news.php');
include('includes/widgets/widget-events.php');
include('includes/widgets/widget-images.php');
include('includes/widgets/widget-gallery.php');
include('includes/widgets/widget-hours.php');
include('includes/widgets/widget-featureddish.php');



/** INCLUDE CUSTOM POST TYPES *************************************************/
include_once(get_template_directory() . '/includes/posttypes/menu.php');
include_once(get_template_directory() . '/includes/posttypes/events.php');
include_once(get_template_directory() . '/includes/posttypes/gallery.php');
include_once(get_template_directory() . '/includes/posttypes/team.php');
include_once(get_template_directory() . '/includes/posttypes/slider.php');



/** THEME TRANSLATION *********************************************************/
$lang = get_template_directory();
load_theme_textdomain('gxg_textdomain', $lang);



/** INCLUDE META BOXES*********************************************************/
define( 'RWMB_URL', trailingslashit( get_template_directory_uri().'/includes/metaboxes' ) );
define( 'RWMB_DIR', trailingslashit( get_template_directory().'/includes/metaboxes' ) );
require_once RWMB_DIR . 'meta-box.php';
include get_template_directory().'/includes/metaboxes/config-meta-boxes.php';



/** ORDERING OF MENU TAXONOMY*************************************************/
if( function_exists('add_term_ordering_support') )
add_term_ordering_support ('menu_category');



/** INCLUDE SHORTCODES ********************************************************/
include_once(get_template_directory() . '/includes/shortcodes/shortcodes.php');



/** CUSTOM GRAVATAR ********************************************************/
function gg_custom_gravatar( $avatar_defaults ) {
    $gg_avatar = of_get_option('gg_gravatar');
    $avatar_defaults[$gg_avatar] = 'Custom Gravatar';
    return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'gg_custom_gravatar' );



/** JQUERY ********************************************************************/
function gg_register_scripts() {
        if (!is_admin()) {
                wp_register_script('superfish', get_template_directory_uri().'/js/superfish.js', 'jquery', true);            
                wp_register_script('prettyPhoto', get_template_directory_uri().'/js/prettyPhoto.js', 'jquery', true);
                wp_register_script('nivoSlider', get_template_directory_uri().'/js/nivoSlider.js', 'jquery', true);
                wp_register_script('hoverIntent', get_template_directory_uri().'/js/hoverIntent.js', 'jquery', true);
                wp_register_script('scripts', get_template_directory_uri().'/js/scripts.js', 'jquery', true);              
                wp_register_script('masonry', get_template_directory_uri().'/js/jquery.masonry.min.js', 'jquery', true);
                wp_register_script('imagesloaded', get_template_directory_uri().'/js/imagesloaded.pkgd.min.js', 'jquery', true);
                wp_register_script('modernizr-transitions', get_template_directory_uri().'/js/modernizr-transitions.js', 'jquery', true);
                wp_register_script('backstretch', get_template_directory_uri().'/js/backstretch.js', 'jquery', true);
                wp_register_script('selectbox', get_template_directory_uri().'/js/jquery.selectbox.js', 'jquery', true);
                wp_register_script('fitVids', get_template_directory_uri().'/js/fitVids.js', 'jquery', true);


                wp_register_style('light', get_template_directory_uri().'/css/skins/light.css', false, 'screen');
                wp_register_style('dark', get_template_directory_uri().'/css/skins/dark.css', false, 'screen');                  
                wp_register_style('prettyPhoto', get_template_directory_uri().'/css/prettyPhoto.css', false, 'screen');
                wp_register_style('nivoSlider', get_template_directory_uri().'/css/nivoSlider.css', 'screen');
                wp_register_style('shortcodes', get_template_directory_uri().'/css/shortcodes.css', false, 'screen');
                wp_register_style('masonry', get_template_directory_uri().'/css/masonry.css', false, 'screen');
                wp_register_style('iconfont', get_template_directory_uri().'/fonts/fontawesome/css/font-awesome.min.css', false, 'screen');
                wp_register_style('socialiconfont', get_template_directory_uri().'/fonts/fontawesome_more/css/font-awesome-social.css', false, 'screen');
                wp_register_style('oldie', get_template_directory_uri().'/css/ie8-and-down.css', false, 'screen');
                wp_register_style('layout', get_template_directory_uri().'/css/layout-responsive.css', false, 'screen');
                wp_register_style('skeleton', get_template_directory_uri().'/css/skeleton.css', false, 'screen');
        }
}
add_action('init', 'gg_register_scripts');


function gg_enqueue_scripts() {
        
        global $wp_styles;
        
        if (!is_admin()) {
                  wp_enqueue_script('jquery');
                  wp_enqueue_script('backstretch');                  
                  wp_enqueue_script('scripts');                 
                  wp_enqueue_script('masonry');
                  wp_enqueue_script('imagesloaded');
                  wp_enqueue_script('superfish');
                  wp_enqueue_script('modernizr-transitions'); 
                  wp_enqueue_script('hoverIntent');
                  wp_enqueue_script('selectbox');
                  wp_enqueue_script('prettyPhoto');  
                  wp_enqueue_script('fitVids');                  
                wp_enqueue_script('jquery-ui-core');
                wp_enqueue_script('jquery-ui-widget');
                wp_enqueue_script('jquery-ui-tabs');
                  

                  wp_enqueue_style('style', get_stylesheet_uri() );                    
                  wp_enqueue_style('masonry');             
                  wp_enqueue_style('iconfont');
                  wp_enqueue_style('socialiconfont');
                  wp_enqueue_style('prettyPhoto');
                  wp_enqueue_style('shortcodes');
                  
                  // skin css
                  $template_skin = of_get_option('gg_skin');                    
                  wp_enqueue_style($template_skin);
                  
                  $wp_styles->add_data('oldie', 'conditional', 'IE');
                  wp_enqueue_style('oldie'); // old IE styles
         }
}
add_action('wp_enqueue_scripts', 'gg_enqueue_scripts');


// load on homepage
function gg_home_scripts() {
	if (is_page_template('template-home.php') && !is_admin() )
                  wp_enqueue_style('nivoSlider');
                  wp_enqueue_script('nivoSlider');
}
add_action('wp_enqueue_scripts', 'gg_home_scripts');


// load on single pages
function gg_single_scripts() {
        if ( is_singular() && get_option( 'thread_comments' ) )
                wp_enqueue_script( 'comment-reply' );
        }
add_action('wp_enqueue_scripts', 'gg_single_scripts');


// responsive style
function gg_responsive_style() {
	if ( of_get_option('gg_responsive') && !is_admin() ) { 
                  wp_enqueue_style('layout');
                  wp_enqueue_style('skeleton');
        }
}
add_action('wp_enqueue_scripts', 'gg_responsive_style');
?>