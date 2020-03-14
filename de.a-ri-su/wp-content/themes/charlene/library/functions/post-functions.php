<?php

/* Add the excerpt filters */
	add_filter( 'excerpt_length', 'eighttwenty_excerpt_length' );
	add_filter( 'the_excerpt', 'eighttwenty_excerpt_replace' );
	
	add_action('eighttwenty_before_entry', 'eighttwenty_post_title');
	add_action('eighttwenty_before_entry_summary', 'eighttwenty_post_title');
	add_action( 'eighttwenty_before_entry', 'eighttwenty_byline');
	add_action( 'eighttwenty_after_entry_summary', 'eighttwenty_postmeta');
	
	if (get_option('etm_post_content') == true) { 
		add_action('eighttwenty_before_entry_summary', 'eighttwenty_byline'); 
	}

/**
 * Placing a word limit.
 */
function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  	if(count($words) > $word_limit) {
  		array_pop($words);
  		//add a ... at last article when more than limit word count
  		echo implode(' ', $words)."..."; } else {
  		//otherwise
  		echo implode(' ', $words); }
}

/**
 * Outputs new excerpt length by adding a
 * filter to the excerpt length. To control
 * the length change $option_value. To remove
 * comment out the filter above.
 *
 * @since 0.1
 */
function eighttwenty_excerpt_length() {
	$option_value = 120;
	return $option_value;
}

/**
 * Strip Tags from Excerpt to make it pretty.
 *
 * @since 0.1
 */
function eighttwenty_excerpt() {
	$content = strip_tags(the_content());
	return $content;
}

/**
  * Replace invalid ellipsis in the_excerpt with text
  * linking to the post.
  *
  * @since 0.1
  */
function eighttwenty_excerpt_replace($text) {
		return str_replace('[...]', '&hellip;', $text);
}

/**
 * Display Post Titles
 */
function eighttwenty_post_title() {
	if (is_singular()) {
		$title = '<h1 class="entry-title">';
		$title .= get_the_title();
		$title .= '</h1>';
	} else {
		$title = '<h2 class="entry-title">';
		$title .= '<a href="';
		$title .= get_permalink();
		$title .= '" rel="bookmark" title="Permanent Link to';
		$title .= the_title_attribute('echo=0');
		$title .= '">';
		$title .= get_the_title();
		$title .= '</a></h2>';
	}
	
	echo apply_filters( 'eighttwenty_post_title', $title);
}

/**
 * Display byline below post single
 */

function eighttwenty_byline() {
	$byline = '<div class="byline">';
	$byline .= __('Written by ', 'eighttwenty');
	$byline .= '<span class="author vcard">';
	$byline .= '<span class="fn n">';
	$byline .= get_the_author_meta( 'display_name' );
	$byline .= '</span>';
	$byline .= '</span>';
	$byline .= ' <abbr class="published updated" title="';
	$byline .= get_the_time('l, F jS, Y, g:i a') . '">';
	$byline .= get_the_time('F d, Y');
	$byline .= '</abbr></div>';
	
	echo apply_filters('eighttwenty_byline',$byline);
}

/**
 * Display Meta Info
 * Home/Archive/Search Templates
 */
function eighttwenty_postmeta() {
	
	$meta = '<p class="postmeta">';
	$meta .= '<abbr class="published updated" title="';
	$meta .= get_the_time('l, F jS, Y, g:i a') . '">';
	$meta .= get_the_time('m.d.Y') . '</abbr> // ';
	$meta .= '<a class="read-more" href="';
	$meta .= get_permalink();
	$meta .= '" rel="bookmark" title="Permanent Link to';
	$meta .= the_title_attribute('echo=0') . '">';
	$meta .= __('Continue Reading &#187;', 'eighttwenty');
	$meta .= '</a></p>';
	
	echo apply_filters('eighttwenty_postmeta',$meta);
}
?>