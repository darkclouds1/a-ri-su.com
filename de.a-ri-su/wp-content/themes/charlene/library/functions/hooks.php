<?php

/**
 * Below is a list of theme hook available to you
 * for easier customization of the theme.
 * For more information please visit @link http://papetreedesign.com/themes/
 */

/**
 * Added befor wp_head
 */
function eighttwenty_head() {
	do_action( 'eighttwenty_head' );
}

/**
 * Before content after <body>
 */
function eighttweny_before_html() {
	do_action( 'eighttwenty_before_html');
}

/**
 * Added before #header
 */
function eighttwenty_aboveheader() {
    do_action('eighttwenty_aboveheader');
}

/**
 * Added after #header
 */
function eighttwenty_belowheader() {
    do_action('eighttwenty_belowheader');
}

/**
 * Add before entry-content
 */
function eighttwenty_before_entry() {
    do_action('eighttwenty_before_entry');
}

/**
 * Added after entry-content
 */
function eighttwenty_after_entry() {
    do_action('eighttwenty_after_entry');
}

/**
 * Before Entry Home/Archives/Search
 */
function eighttwenty_before_entry_summary() {
	do_action('eighttwenty_before_entry_summary');
}

/**
 * Before Entry Home/Archives/Search
 */
function eighttwenty_after_entry_summary() {
	do_action('eighttwenty_after_entry_summary');
}

/**
 * Before Comments-list
 */
function eighttwenty_before_comments() {
	do_action('eighttwenty_before_comments');
}

/**
 * After Comments-List
 **/
function eighttwenty_after_comments() {
	do_action('eighttwenty_after_comments');
}

/**
 * Before Pings
 **/
function eighttwenty_before_pings() {
	do_action('eighttwenty_before_pings');
}

/**
 * After Pings
 **/
function eighttwenty_after_pings() {
	do_action('eighttwenty_after_pings');
}

/**
 * Added inside #secondary above widgets
 */
function eighttwenty_secondary_above() {
    do_action('eighttwenty_secondary_above');
}

/**
 * Added inside #secondary mid widgets
 */
function eighttwenty_secondary_mid() {
    do_action('eighttwenty_secondary_mid');
}

/**
 * Before closing #secondary below widgets
 */
function eighttwenty_secondary_below() {
    do_action('eighttwenty_secondary_below');
}

/**
 * Added before #footer
 */
function eighttwenty_above_footer() {
    do_action('eighttwenty_above_footer');
}

/**
 * Added after #footer
 **/
function eighttwenty_below_footer() {
    do_action('eighttwenty_below_footer');
}

/**
 * After content before </body>
 */
function eighttwenty_after_html() {
	do_action( 'eighttwenty_after_html');
}

?>