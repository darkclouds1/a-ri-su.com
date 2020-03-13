<?php

remove_action('wp_head', 'wp_generator');
	
	add_action('eighttwenty_head', 'eighttwenty_header_script');
	add_action('eighttwenty_head', 'eighttwenty_meta_description');
	add_action('eighttwenty_head', 'eighttwenty_meta_keywords');
	add_action('eighttwenty_head', 'eighttwenty_meta_robots');
	add_action('eighttwenty_head', 'eighttwenty_canonical_url');
	add_action('eighttwenty_head', 'eighttwenty_pingback');
	add_action('eighttwenty_head', 'eighttwenty_rss_link');
	add_action('eighttwenty_head', 'eighttwenty_favicon_url');

/**
 * Eighttwenty Title Function
 *
 * Inserts Title Tag
 * SEO Title Tag Plugin Ready
 */ 
function eighttwenty_title_tag() {
	$sep = ' | ';
    if (function_exists('seo_title_tag')) { echo seo_title_tag(); 
       } elseif (is_home() || is_front_page()) { 
           echo bloginfo('name') . ' | '; bloginfo('description');
       } elseif (is_404()) {
           echo '404 Not Found';
       } elseif (is_category()) {
           echo 'Category Archive:'; wp_title('');
       } elseif (is_search()) {
           echo 'Search Results for ';  the_search_query();
       } elseif ( is_day() || is_month() || is_year() ) {
           echo 'Archives:'; wp_title('');
       } elseif ( is_single() || is_page() ) {
           echo single_post_title('');
       } else {
       	   echo bloginfo('name');
     }
}

/**
 * Custom Post Meta Description
 *
 * Can be set per page/post using custom 
 * fields with key 'description'.
 */
function eighttwenty_meta_description() {
    global $post;   
    
    if ( get_option('etm_seo_add') != "true" ){
    echo "\t" . '<meta name="description" content="';
    if (is_single() || is_page()) {
        $my_key = get_post_meta($post->ID, 'description', true) ;
        if ( !empty($my_key) ) {
	    echo get_post_meta($post->ID, 'description', true);
	    } else if ( have_posts() ) {
          		  while ( have_posts() ) {
            		    the_post();
            		    $content = substr(get_the_excerpt(), 0, 160);
            		    echo $content;
             	  		}
	        		}
	} elseif(is_category()) {
		echo '-category archive' . single_cat_title();
	} elseif(is_tag()) {
		echo '-tag archive page for this blog' . single_tag_title();
	} elseif(is_month()) {
    	echo 'archive page for this blog' . the_time('F, Y');
	} else { 
		if ( get_option('etm_description') != "") {
			echo stripslashes(get_option('etm_description'));
		} else {
    		echo bloginfo('description');
    	}
    }
    echo "\"/>" . "\n";
   }
}

/**
 * Meta Keywords
 *
 * Main Set in Options Panel, per page set
 * using custom fields with name 'keyword'.
 */
function eighttwenty_meta_keywords() {
    global $post;
    $etm_key = get_post_meta($post->ID, 'keywords', true) ;
    
    	if ( get_option('etm_seo_add') != "true" ){
    		if (is_single() || is_page()) {
        		if ( !empty($etm_key) ) {
    				$keywords = "\t" . '<meta name="keywords" content="';
					$keywords .= get_post_meta($post->ID, 'keywords', true);
					$keywords .= '"/>';
				}
			} elseif (is_home() || is_front_page()) {
				if (get_option('etm_keywords') != "") {
					$keywords = "\t" . '<meta name="keywords" content="';
					$keywords .= get_option('etm_keywords');
					$keywords .= '"/>' . "\n";
				}
			}
		 }
			

	echo apply_filters('eightwenty_meta_keywords', $keywords);
}

/**
 * Creates Canonical Url
 *
 * Credit to Thematic Theme by Ian Stewart
 */
function eighttwenty_canonical_url() {
		if ( get_option('etm_seo_add') != "true" ){
    		if ( is_singular() ) {
        		$canonical_url = "\t";
        		$canonical_url .= '<link rel="canonical" href="' . get_permalink() . '" />';
        		$canonical_url .= "\n\n";        
        		echo apply_filters('eighttwenty_canonical_url', $canonical_url);
				}
    }
}

/**
 * Add Meta Robots
 *
 * Credit Online Marketing Research
 * @link http://www.seoresearcher.com/how-to-make-your-wordpress-blog-duplicate-content-safe.htm
 */

function eighttwenty_meta_robots() {
	if ( !get_option( 'blog_public' ) )
		return;
		
		if ( get_option('etm_seo_add') != "true" ){
			if((is_home() && ($paged < 2 )) || is_single() || is_page() || is_category()){
				echo "\n\t" . '<meta name="robots" content="index,follow" />';
				echo "\r";
			} elseif(is_search()) {
				echo "\n\t" . '<meta name="robots" content="noindex, nofollow" />';
				echo "\r";
			} else {
				echo "\n\t" . '<meta name="robots" content="noindex,follow" />';
				echo "\n";
		}
	}
}

function eighttwenty_pingback () {
	$ping = "\t" . '<link rel="pingback" href="' . get_bloginfo('pingback_url') . '" />' . "\n\n";
		echo apply_filters('eighttwenty_pingback', $ping);
	}

/**
 * Create RSS Link
 *
 * If Feedburner is enabled in options panel
 * then prints Feedburner Url, if not enabled
 * then prints default WordPress RSS.
 */
function eighttwenty_rss_link() {
       if ( get_option('etm_feedburner') != "") {
           $rss_url = get_option('etm_feedburner');
       } else {
           $rss_url = get_bloginfo_rss('rss2_url'); 
       }
       $content = "\t";
       $content .= "<link rel=\"alternate\" type=\"application/rss+xml\" href=\"";
       $content .= $rss_url;
       $content .= "\" title=\"";
       $content .= wp_specialchars(get_bloginfo('name'), 1);
       $content .= " " . __('RSS Feed');
       $content .= "\" />";
       $content .= "\n\n";
       
       echo apply_filters('eighttwenty_rss_link', $content);
} 

/**
 * Option to display Favicon.ico in head.
 * Controlled via Theme Admin
 */
function eighttwenty_favicon_url() {
	   if ( get_option('etm_favicon') != "")  {
           echo "\t" . "<link rel=\"shortcut icon\" href=\"";
           echo stripslashes(get_option('etm_favicon'));
           echo  "\" />";
           echo "\n\r";
       }
}

/**
 * Insert Headerscript
 *
 * Used primarily for inserting Google Meta Verify
 */
function eighttwenty_header_script() { 
  	if ( get_option('etm_headerscript') != "" ) {
    	  echo "\t" . stripslashes(get_option('etm_headerscript'));
    	  echo "\r";
  } 
}
?>