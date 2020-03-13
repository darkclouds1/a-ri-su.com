<?php

add_action('eighttwenty_above_footer', 'eighttwenty_options');
add_action('eighttwenty_head', 'eighttwenty_options');
add_action('eighttwenty_after_html', 'eighttwenty_analytics');
add_action('eighttwenty_after_entry', 'eighttwenty_breadcrumb_nav');

/**
  * Add Custom Options to specific theme file
  * using custom hooks.
  */
function eighttwenty_options() {
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; }
    else { $$value['id'] = get_settings( $value['id'] ); }
    }
}

/**
 * Breadcrumb Navigation
 */

function eighttwenty_breadcrumb_nav() {
	if ((is_page() && !is_front_page()) || !is_home() || is_category() || is_single() ) {
		echo '<ul id="breadcrumb-nav">';
		echo '<li class="front_page"><a href="'.get_bloginfo('url').'">Home</a></li>';
		$post_ancestors = get_post_ancestors($post);
		if ($post_ancestors) {
			$post_ancestors = array_reverse($post_ancestors);
			foreach ($post_ancestors as $crumb)
				echo '<li>&#8260; <a href="'.get_permalink($crumb).'">'.get_the_title($crumb).'</a></li>';
		}
		if (is_category() || is_single()) {
			$category = get_the_category();
			echo '<li>&#8260; <a href="'.get_category_link($category[0]->cat_ID).'">'.$category[0]->cat_name.'</a></li>';
		}
		if (!is_category())
			echo '<li class="current">&#8260; <a href="'.get_permalink().'">'.get_the_title().'</a></li>';
			echo '</ul>';
	}
}

/**
 * Add Main Site title via admin options.
 * Default is blog name
 */
function eighttwenty_site_title() {
	$sitetitle = '<div class="logo">';
	$sitetitle .= "\n\t\t\t\t" . '<a href="'.get_bloginfo('home').'" title="' . get_bloginfo('name') . '">';
	if (get_option('etm_site_title') != "") {
		$sitetitle .= stripslashes( get_option('etm_site_title'));
	} else {
		$sitetitle .= get_bloginfo('name');
	}
	$sitetitle .= '</a>';
	$sitetitle .= "\n\t\t\t" . '</div><!-- end .logo -->';
	$sitetitle .= "\n";
	
	echo apply_filters('eighttwenty_site_title', $sitetitle);
}

/**
 * Add quote via admin options
 *
 * Places quote in header file, just under
 * main site title.
 */
function eighttwenty_insert_quote() {
	if ( get_option('etm_quote') != "") {
		echo stripslashes( get_option('etm_quote') );
	} else {
		echo '&ldquo;This would be a brilliant place for something inspirational, or perhaps just a tagline.&rdquo;';
	}
}

/**
 * Add large home page title via admin options.
 */
function eighttwenty_home_title() {
	if ( get_option('etm_home_title') != "") {
		echo stripslashes( get_option('etm_home_title') );
	} else {
		echo 'Meet Charlene';
	}
}

/**
 * Add home page short description
 * below title via admin options.
 */
function eighttwenty_colophon() {
	if ( get_option('etm_descriptive') != "") {
		echo stripslashes( get_option('etm_descriptive') );
	} else {
		echo 'Here you could perhaps write a short paragraph about yourself or the brilliance expressed through your writing. Doesn\'t have to be anything long but it should be exciting!';
	}
}

/**
 * Switch between full content and the excerpt.
 * Defaults to excerpt. Option available in theme options
 */
function eighttwenty_post_content() {
	if (get_option('etm_post_content') == true) {
		 the_content();
	} else {
		the_excerpt();
	}
	echo apply_filters('eighttwenty_post_content', $post);
}

/**
 * Custom control of copyright in footer
 * or it returns copyright plus blog name.
 */
function eighttwenty_copyright() {
	$copy = '<div class="footer-copy">';
		if ( get_option('etm_copyright') != "") {
		    $copy .= '<p><span class="copy">';
			$copy .= stripslashes( get_option('etm_copyright') );
			$copy .= '</span></p>';
		} else {
			$copy .= '<p>Powered by WordPress and Charlene' . '<br />';
			$copy .= '<span class="copy">Copyright &#169;' . get_the_time('Y') . '' . get_bloginfo('name') . '</span></p>';
	$copy .= '</div><!--end .footer-copy -->';
	$copy .= "\r";
		}
		echo apply_filters('eighttwenty_copyright', $copy);
}

/**
 * Outputs analytics below footer.
 * Controlled via theme options.
 */
function eighttwenty_analytics() {
	if ( get_option('etm_analytics') != "" ) {
		echo stripslashes(get_option('etm_analytics')); 
	}
}

?>